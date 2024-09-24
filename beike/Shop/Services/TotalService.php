<?php
/**
 * TotalService.php
 *

 * @created    2022-07-22 17:11:31
 * @modified   2022-07-22 17:11:31
 */

namespace Beike\Shop\Services;

use Beike\Models\Cart;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Beike\Models\TaxClass;

class TotalService
{
    protected const TOTAL_CODES = [
        'subtotal',
        'tax',
        'shipping',
        'voucher_id',
        'customer_discount',
        'subtotal_discount',
        'subtotal_origin',
    ];
    protected Cart $currentCart;

    protected array $cartProducts;

    public array $taxes = [];

    public array $totals;

    public $voucherId = 0;

    public float $amount = 0;

    protected string|array $shippingMethod = '';

    public function __construct($currentCart, $cartProducts)
    {
        $this->currentCart  = $currentCart;
        $this->cartProducts = $cartProducts;
        $this->setShippingMethod($currentCart->shipping_method_code);
        $this->setVoucherId($currentCart->voucher_id);
        $this->getTaxes();
    }

    /**
     * 设置配送方式
     */
    public function setShippingMethod($methodCode): self
    {
        $this->shippingMethod = $methodCode;

        return $this;
    }

    public function setVoucherId($voucherId)
    {
        $this->voucherId = $voucherId ?? 0;

        return $this;
    }

    public function getShippingMethod(): string
    {
        return $this->shippingMethod;
    }

    public function getVoucherId()
    {
        return $this->voucherId;
    }

    /**
     * 获取税费数据
     *
     * @return array
     */
    public function getTaxes(): array
    {
        $this->taxes['totalTax'] = 0;
        $this->taxes['list']     = [];
        foreach ($this->cartProducts as $product) {
//            $taxRates = TaxClass::find($product['tax_class_id'])->taxRates->jsonSerialize();
            if ($product['price'] > $product['cost_price']) {
                $this->taxes['totalTax']  += round($product['price']  - $product['cost_price']) * $product['quantity'];
            }

        }

        return $this->taxes;
    }

    /**
     * @param CheckoutService $checkout
     * @return array
     */
    public function getTotals(CheckoutService $checkout): array
    {
        $maps = $this->getTotalClassMaps();
        foreach ($maps as $service) {
            if (! class_exists($service) || ! method_exists($service, 'getTotal')) {
                continue;
            }
            $service::getTotal($checkout);
        }

        return hook_filter('service.total.totals', $this->totals);
    }

    /**
     * total 与类名 映射
     *
     * @return mixed
     */
    private function getTotalClassMaps()
    {
        $maps = [];
        foreach (self::TOTAL_CODES as $code) {
            $serviceName = Str::studly($code) . 'Service';
            $maps[$code] = "\Beike\\Shop\\Services\\TotalServices\\{$serviceName}";
        }

        $maps                = hook_filter('service.total.maps', $maps);
        $maps['order_total'] = "\Beike\\Shop\\Services\\TotalServices\\OrderTotalService";

        return $maps;
    }

    /**
     * 获取当前购物车商品总额
     *
     * @return mixed
     */
    public function getSubTotal(): mixed
    {
        $carts = $this->cartProducts;

        return collect($carts)->sum('subtotal');
    }

    /**
     * Get Cart Products
     *
     * @return array
     */
    public function getCartProducts(): array
    {
        return $this->cartProducts;
    }

    /**
     * Get Current Cart
     *
     * @return Cart
     */
    public function getCurrentCart()
    {
        return $this->currentCart;
    }

    /**
     * Get Cart Product Amount
     *
     * @return mixed
     */
    public function countProducts(): mixed
    {
        $cartProducts = $this->getCartProducts();

        return collect($cartProducts)->sum('quantity');
    }
}
