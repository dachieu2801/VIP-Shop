<?php
/**
 * Bootstrap.php
 *
 * @copyright  2023 beikeshop.com - All Rights Reserved
 * @link       https://beikeshop.com
 * @author     Edward Yang <yangjin@guangda.work>
 * @created    2023-08-17 15:15:27
 * @modified   2023-08-17 15:15:27
 */

namespace Plugin\Custom;

use Plugin\Custom\Services\CustomService;
use Stripe\Exception\ApiErrorException;

class Bootstrap
{
    public function boot(): void
    {
        add_hook_filter('service.payment.mobile_pay.data', function ($data) {
            $order = $data['order'];
            if ($order->payment_method_code != 'custom') {
                return $data;
            }
            return $data;
        });
    }
}
