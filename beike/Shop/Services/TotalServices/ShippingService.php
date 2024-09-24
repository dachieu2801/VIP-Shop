<?php

/**
 * ShippingService.php
 *

 * @created    2022-07-22 17:58:14
 * @modified   2022-07-22 17:58:14
 */

namespace Beike\Shop\Services\TotalServices;

use Beike\Shop\Services\CheckoutService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ShippingService
{
    /**
     * @param CheckoutService $checkout
     * @return array|null
     * @throws \Exception|\Throwable
     */
    public static function getTotal(CheckoutService $checkout): ?array
    {
        $totalService   = $checkout->totalService;
        $shippingMethod = $totalService->getShippingMethod();

        if (empty($shippingMethod)) {
            return null;
        }

        $shippingPluginCode = self::parseShippingPluginCode($shippingMethod);
        $pluginCode         = Str::studly($shippingPluginCode);

        if (! app('plugin')->checkActive($shippingPluginCode)) {
            $cart                       = $checkout->cart;
            $cart->shipping_method_code = '';
            $cart->saveOrFail();

            return [];
        }

        $className = "Plugin\\{$pluginCode}\\Bootstrap";
        if (! method_exists($className, 'getShippingFee')) {
            throw new \Exception("Vui lòng thêm vào plugin {$className} Phương pháp thực hiện: public function getShippingFee(CheckoutService \$checkout)");
        }

        $amount    = (float) (new $className)->getShippingFee($checkout);

        $totalData = [
            'code'          => 'shipping',
            'title'         => trans('shop/carts.shipping_fee'),
            'amount'        => $amount,
            'amount_format' => currency_format($amount),
        ];

        $totalService->amount += $totalData['amount'];
        $totalService->totals[] = $totalData;

        return $totalData;
    }

    public static function parseShippingPluginCode($shippingMethod): string
    {
        $methodArray = explode('.', $shippingMethod);

        return $methodArray[0];
    }
}
