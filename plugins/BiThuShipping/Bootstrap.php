<?php
/**
 * bootstrap.php
 *
 * @copyright  2022 beikeshop.com - All Rights Reserved
 * @link       https://beikeshop.com
 * @author     Edward Yang <yangjin@guangda.work>
 * @created    2022-07-20 15:35:59
 * @modified   2022-07-20 15:35:59
 */

namespace Plugin\BiThuShipping;

use Beike\Admin\Http\Resources\PluginResource;
use Beike\Plugin\Plugin;
use Beike\Shop\Services\CheckoutService;
use Illuminate\Support\Facades\Log;

class Bootstrap
{
    /**
     * 获取固定运费方式
     *
     * @param CheckoutService $checkout
     * @param Plugin          $plugin
     * @return array
     * @throws \Exception
     */
    public function getQuotes(CheckoutService $checkout, Plugin $plugin): array
    {
        $code           = $plugin->code;
        $pluginResource = (new PluginResource($plugin))->jsonSerialize();
        $quotes[]       = [
            'type'        => 'shipping',
            'code'        => $code,
            'name'        => $pluginResource['name'],
            'description' => $pluginResource['description'],
            'icon'        => $pluginResource['icon'],
            'cost'        => $this->getShippingFee($checkout),
        ];

        return $quotes;
    }

    /**
     * 计算固定运费
     *
     * @param CheckoutService $checkout
     * @return float|int
     */
    public function getShippingFee(CheckoutService $checkout): float|int
    {
        $totalService  = $checkout->totalService;
        $amount        = $totalService->amount;

        $shippingType  = plugin_setting('bithu_shipping.type', 'fixed');
        $shippingValue = plugin_setting('bithu_shipping.value', 0);
        if ($shippingType == 'fixed') {
            return $shippingValue;
        } elseif ($shippingType == 'percent') {
            return $amount * $shippingValue / 100;
        }

        return 0;

    }
}
