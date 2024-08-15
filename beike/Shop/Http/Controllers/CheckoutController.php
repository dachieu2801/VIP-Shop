<?php
/**
 * CheckoutController.php
 *
 * @copyright  2022 beikeshop.com - All Rights Reserved
 * @link       https://beikeshop.com
 * @author     Edward Yang <yangjin@guangda.work>
 * @created    2022-06-28 16:47:57
 * @modified   2022-06-28 16:47:57
 */

namespace Beike\Shop\Http\Controllers;

//use Beike\Notifications\sendNewOrderNotification;
use Beike\Mail\SendNotifyOrder;
use Beike\Repositories\OrderRepo;
use Beike\Repositories\VouchersRepo;
use Beike\Shop\Services\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Beike\Models\AdminUser;
class CheckoutController extends Controller
{
    public function index()
    {
        try {
            $data              = (new CheckoutService)->checkoutData();
            $data              = hook_filter('checkout.index.data', $data);

            if ($data['current']['voucher_id']) {
                $voucher = (new VouchersRepo)->getByIdActive($data['current']['voucher_id']);
                if (! $voucher) {
                    $data['current']['voucher_id'] = 0;
                } else {
                    $newTotals      = [];
                    $orderTotal     = null;
                    foreach ($data['totals'] as $item) {
                        if ($item['code'] === 'order_total') {
                            $orderTotal = $item;
                        } else {
                            $newTotals[] = $item;
                        }
                    }
                    if ($voucher['discount_type'] == 'percentage') {
                        $amount       = floatval($voucher['discount_value']) / 100 * floatval($orderTotal['amount']);
                        $newTotals[]  = [
                            'code'          => 'voucher_id',
                            'title'         => $voucher['name'],
                            'amount'        => $amount,
                            'amount_format' => '- ' . currency_format($amount),
                        ];
                        $amountTotal =  floatval($orderTotal['amount']) - $amount < 0 ? 0 : floatval($orderTotal['amount']) - $amount;
                        $newTotals[] = [
                            'code'          => 'order_total',
                            'title'         => trans('shop/carts.order_total'),
                            'amount'        => $amountTotal,
                            'amount_format' => currency_format($amountTotal),
                        ];
                    } else {
                        $amount       = floatval($voucher['discount_value']);
                        $newTotals[]  = [
                            'code'          => 'voucher_id',
                            'title'         => $voucher['name'],
                            'amount'        => $amount,
                            'amount_format' => '- ' . currency_format($amount),
                        ];
                        $amountTotal =  floatval($orderTotal['amount']) - $amount < 0 ? 0 : floatval($orderTotal['amount']) - $amount;
                        $newTotals[] = [
                            'code'          => 'order_total',
                            'title'         => trans('shop/carts.order_total'),
                            'amount'        => $amountTotal,
                            'amount_format' => currency_format($amountTotal),
                        ];
                    }
                    $data['totals'] = $newTotals;
                }

            }

            return view('checkout', $data);
        } catch (\Exception $e) {
            return redirect(shop_route('carts.index'))->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * 更改结算信息
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request): mixed
    {
        try {
            $requestData = $request->all();

            $data       = (new CheckoutService)->update($requestData);
            if ($data['current']['voucher_id']) {
                $voucher = (new VouchersRepo)->getByIdActive($data['current']['voucher_id']);
                if (! $voucher) {
                    $data['current']['voucher_id'] = 0;
                } else {
                    $newTotals      = [];
                    $orderTotal     = null;
                    foreach ($data['totals'] as $item) {
                        if ($item['code'] === 'order_total') {
                            $orderTotal = $item;
                        } else {
                            $newTotals[] = $item;
                        }
                    }
                    if ($voucher['discount_type'] == 'percentage') {
                        $amount       = floatval($voucher['discount_value']) / 100 * floatval($orderTotal['amount']);
                        $newTotals[]  = [
                            'code'          => 'voucher_id',
                            'title'         => $voucher['name'],
                            'amount'        => $amount,
                            'amount_format' => '- ' . currency_format($amount),
                        ];
                        $amountTotal =  floatval($orderTotal['amount']) - $amount < 0 ? 0 : floatval($orderTotal['amount']) - $amount;
                        $newTotals[] = [
                            'code'          => 'order_total',
                            'title'         => trans('shop/carts.order_total'),
                            'amount'        => $amountTotal,
                            'amount_format' => currency_format($amountTotal),
                        ];
                    } else {
                        $amount       = floatval($voucher['discount_value']);
                        $newTotals[]  = [
                            'code'          => 'voucher_id',
                            'title'         => $voucher['name'],
                            'amount'        => $amount,
                            'amount_format' => '- ' . currency_format($amount),
                        ];
                        $amountTotal = max(floatval($orderTotal['amount']) - $amount, 0);
                        $newTotals[] = [
                            'code'          => 'order_total',
                            'title'         => trans('shop/carts.order_total'),
                            'amount'        => $amountTotal,
                            'amount_format' => currency_format($amountTotal),
                        ];
                    }
                    $data['totals'] = $newTotals;
                }

            }

            return hook_filter('checkout.update.data', $data);
        } catch (\Exception $e) {
            return json_fail($e->getMessage());
        }
    }

    /**
     * 确认提交订单
     *
     * @return mixed
     * @throws \Throwable
     */
    public function confirm(Request $request)
    {
        $requestData = $request->all();

        if (! $requestData['receive_time']) {
            return json_fail('Vui lòng chọn thời gian nhận');
        }

        try {
            $data = (new CheckoutService)->confirm($requestData['voucher_id'] ?? 0);

            $this->sendEmail($data->jsonSerialize());

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
