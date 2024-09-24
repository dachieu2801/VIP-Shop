<?php
/**
 * Bootstrap.php
 *

 * @created    2023-08-17 15:15:27
 * @modified   2023-08-17 15:15:27
 */

namespace Plugin\VnPay;

use Stripe\Exception\ApiErrorException;

class Bootstrap
{
    /**
     * https://uniapp.dcloud.net.cn/tutorial/app-payment-paypal.html
     *
     * @throws ApiErrorException
     * @throws \Exception
     * @throws \Throwable
     */
    public function boot(): void
    {
        add_hook_filter('service.payment.mobile_pay.data', function ($data) {
            $order = $data['order'];
            if ($order->payment_method_code != 'vn_pay') {
                return $data;
            }
            return $data;
        });
    }
}
