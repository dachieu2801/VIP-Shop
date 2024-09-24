<?php


namespace Plugin\COD;

use Plugin\Paypal\Services\PaypalService;
use Stripe\Exception\ApiErrorException;

class Bootstrap
{
    
    public function boot(): void
    {
        add_hook_filter('service.payment.mobile_pay.data', function ($data) {
            $order = $data['order'];
            if ($order->payment_method_code != 'cod') {
                return $data;
            }

//            $data['params'] = (new PaypalService($order))->getMobilePaymentData();

            return $data;
        });
    }
}
