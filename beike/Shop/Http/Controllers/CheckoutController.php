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
use Beike\Repositories\OrderRepo;
use Beike\Repositories\VouchersRepo;
use Beike\Shop\Services\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        try {
            $data              = (new CheckoutService)->checkoutData();
            $data              = hook_filter('checkout.index.data', $data);

            if ($data['current']['voucher_id']) {
                $newVoucher = (new VouchersRepo)->getByIdActive($data['current']['voucher_id']);
                if (! $newVoucher) {
                    $data['current']['voucher_id'] = 0;
                }

            }
            Log::info('adasdadsa', ['ád' => $data]);

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
            Log::info('adasdadsa update', ['ád' => $data]);
            ///////////////////////////////////////////////////
            if ($data['current']['voucher_id']) {
                $voucher = (new VouchersRepo)->getByIdActive($data['current']['voucher_id']);
                if (! $voucher) {
                    $data['current']['voucher_id'] = 0;
                }

                $newTotals      = [];
                $orderTotalItem = null;

                foreach ($data['totals'] as $item) {
                    if ($item['code'] === 'order_total') {
                        $orderTotalItem = $item;
                    }
                    $newTotals[] = $item;
                }


                if ($voucher['discount_type'] == 'percentage') {

                }

                //                {
                //                    "code": "shipping",
                //                    "title": "Phí vận chuyển",
                //                    "amount": 30000,
                //                    "amount_format": "₫30.000"
                //                  },

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
        try {
            $data = (new CheckoutService)->confirm();
            Log::info('confirm', ['a' => $data]);
            $requestData['voucher_id'];

            return hook_filter('checkout.confirm.data', $data);
        } catch (\Exception $e) {
            return json_fail($e->getMessage());
        }
    }

    public function success()
    {
        $order_number = request('order_number');

        $customer = current_customer();
        $order    = OrderRepo::getOrderByNumber($order_number, $customer);
        $data     = hook_filter('account.order.show.data', ['order' => $order, 'html_items' => []]);

        return view('checkout/success', $data);
    }

    public function decrypt($encrypted): string
    {
        return openssl_decrypt($encrypted, 'aes-256-cbc', env('CREATE_TOKEN_KEY'), 0, env('CREATE_TOKEN_IV'));
    }

    public function encrypt($data): string
    {
        return openssl_encrypt(json_encode($data), 'aes-256-cbc', env('CREATE_TOKEN_KEY'), 0, env('CREATE_TOKEN_IV'));
    }
}
