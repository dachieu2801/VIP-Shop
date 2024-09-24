<?php
/**
 * CheckoutController.php
 *

 * @created    2022-06-28 16:47:57
 * @modified   2022-06-28 16:47:57
 */

namespace Beike\Shop\Http\Controllers;

//use Beike\Notifications\sendNewOrderNotification;
use Beike\Mail\SendNotifyOrder;
use Beike\Models\AdminUser;
use Beike\Models\Setting;
use Beike\Models\TaxClass;
use Beike\Repositories\OrderRepo;
use Beike\Repositories\SettingRepo;
use Beike\Repositories\VouchersRepo;
use Beike\Shop\Services\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function update(Request $request): mixed
    {
        try {
            $requestData = $request->all();
            $data        = (new CheckoutService)->update($requestData);

            $data = $this->calculateTotals($data);

            return hook_filter('checkout.update.data', $data);
        } catch (\Exception $e) {
            return json_fail($e->getMessage());
        }
    }

    public function index()
    {
        try {
            $data = (new CheckoutService)->checkoutData();
            $data = hook_filter('checkout.index.data', $data);

            $data = $this->calculateTotals($data);

            return view('checkout', $data);
        } catch (\Exception $e) {
            return redirect(shop_route('carts.index'))->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function confirm(Request $request)
    {
        $requestData = $request->all();

        try {
            $data = (new CheckoutService)->confirm($requestData['voucher_id'] ?? 0);

            try {
                $this->sendEmail($data->jsonSerialize());
            } catch (\Exception $e) {
                Log::info('Error send mail');
            }

            return hook_filter('checkout.confirm.data', $data);
        } catch (\Exception $e) {
            return json_fail($e->getMessage());
        }
    }

    public function success()
    {
        $order_number = request('order_number');
        $customer     = current_customer();
        $order        = OrderRepo::getOrderByNumber($order_number, $customer);
        $data         = hook_filter('account.order.show.data', ['order' => $order, 'html_items' => []]);

        return view('checkout/success', $data);
    }

    public function sendEmail($data)
    {
        if (env('MAIL_PORT')) {
            try {

                $detailCustomer = [
                    'tracking_number' => $data['number'],
                    'order_at'        => $data['created_at'],
                    'amount'          => $data['total_format'],
                    'customer_name'   => $data['customer_name'],
                    'isShop'          => true,
                ];

                $detailShop = [
                    'tracking_number' => $data['number'],
                    'order_at'        => $data['created_at'],
                    'amount'          => $data['total_format'],
                    'customer_name'   => $data['customer_name'],
                    'isShop'          => false,
                ];

                Mail::to($data['email'])->send(new SendNotifyOrder($detailCustomer));

                $activeEmails = AdminUser::where('active', 1)->pluck('email');
                foreach ($activeEmails as $email) {
                    Mail::to($email)->send(new SendNotifyOrder($detailShop));
                }

                return true;
            } catch (\Exception $e) {
                return false;
            }
        }

    }

    public function calculateTotals($data)
    {
        $data = $this->applyPaymentFee($data);
        $data = $this->applyVoucher($data);
        $data = $this->applyTax($data);

        return $data;
    }

    public function applyPaymentFee($data)
    {
        if ($data['current']['payment_method_code'] == 'vn_pay') {
            $newTotals  = [];
            $orderTotal = $this->extractOrderTotal($data['totals'], $newTotals);

            $fee         = SettingRepo::getValuePluginColumns('vn_pay', 'percent_fee') ?? 0;
            $amount      = round($orderTotal['amount'] * $fee / 100);
            $newTotals[] = [
                'code'          => 'paypay_fee',
                'title'         => "Phí thanh toán qua PayPay($fee%)",
                'amount'        => $amount,
                'amount_format' => currency_format($amount),
            ];

            $amountTotal = round($amount + $orderTotal['amount']);
            $newTotals[] = [
                'code'          => 'order_total',
                'title'         => trans('shop/carts.order_total'),
                'amount'        => $amountTotal,
                'amount_format' => currency_format($amountTotal),
            ];

            $data['totals'] = $newTotals;
        }

        return $data;
    }

    public function applyVoucher($data)
    {
        if ($data['current']['voucher_id']) {
            $voucher = (new VouchersRepo)->getByIdActive($data['current']['voucher_id']);
            if (! $voucher) {
                $data['current']['voucher_id'] = 0;
            } else {
                $newTotals  = [];
                $orderTotal = $this->extractOrderTotal($data['totals'], $newTotals);

                $amount      = $this->calculateVoucherAmount($voucher, $orderTotal);
                $newTotals[] = [
                    'code'          => 'voucher_id',
                    'title'         => $voucher['name'],
                    'amount'        => $amount,
                    'amount_format' => '- ' . currency_format($amount),
                ];

                $amountTotal = max($orderTotal['amount'] - $amount, 0);
                $newTotals[] = [
                    'code'          => 'order_total',
                    'title'         => trans('shop/carts.order_total'),
                    'amount'        => round($amountTotal),
                    'amount_format' => currency_format($amountTotal),
                ];

                $data['totals'] = $newTotals;
            }
        }

        return $data;
    }

    public function applyTax($data)
    {
        $tax = Setting::query()
            ->where('type', 'system')
            ->where('space', 'base')
            ->where('name', 'tax')
            ->where('value', '1')
            ->first();

        if ($tax) {
            $amount       = 0;
            $titleTax     = 'Đã bao gồm các loại thuế';
            $taxClasses   = TaxClass::with('taxRates')->get();
            $taxClassMap  = $this->mapTaxClasses($taxClasses);
            $newTotals    = [];
            $orderTotal   = $this->extractOrderTotal($data['totals'], $newTotals);

            foreach ($data['carts']['carts'] as $product) {
                if ($product['price'] > $product['cost_price']) {
                    $amount += round(($product['price'] - $product['cost_price']) * $product['quantity']);
                }

                if (isset($taxClassMap[$product['tax_class_id']])) {
                    $taxNames = array_merge($taxNames ?? [], $taxClassMap[$product['tax_class_id']]);
                }
            }

            if (! empty($taxNames)) {
                $titleTax .= ' (' . implode(', ', array_unique($taxNames)) . ')';
            }

            if ($amount > 0) {
                $newTotals[] = [
                    'code'          => 'tax_fee',
                    'title'         => $titleTax,
                    'amount'        => round($amount),
                    'amount_format' => currency_format($amount),
                ];
            }

            $newTotals[]    = $orderTotal;
            $data['totals'] = $newTotals;
        }

        return $data;
    }

    public function extractOrderTotal($totals, &$newTotals)
    {
        $orderTotal = null;
        foreach ($totals as $item) {
            if ($item['code'] === 'order_total') {
                $orderTotal = $item;
            } else {
                $newTotals[] = $item;
            }
        }

        return $orderTotal;
    }

    public function calculateVoucherAmount($voucher, $orderTotal)
    {
        if ($voucher['discount_type'] == 'percentage') {
            return round(floatval($voucher['discount_value']) / 100 * floatval($orderTotal['amount']));
        }

        return round($voucher['discount_value']);

    }

    public function mapTaxClasses($taxClasses)
    {
        $taxClassMap = [];
        foreach ($taxClasses as $taxClass) {
            $taxClassMap[$taxClass->id] = $taxClass->taxRates->pluck('name')->toArray();
        }

        return $taxClassMap;
    }
}
