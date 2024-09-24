<?php
/**
 * CustomerDiscountService.php
 *

 * @created    2023-02-07 18:49:15
 * @modified   2023-02-07 18:49:15
 */

namespace Beike\Shop\Services\TotalServices;

use Beike\Shop\Services\CheckoutService;

class CustomerDiscountService
{
    /**
     * @param CheckoutService $checkout
     * @return array
     */
    public static function getTotal(CheckoutService $checkout)
    {
        $totalService = $checkout->totalService;
        $customer     = current_customer();
        if (empty($customer)) {
            return null;
        }

        $discountFactor = $customer->customerGroup->discount_factor;
        if ($discountFactor <= 0) {
            return null;
        }
        if ($discountFactor > 100) {
            $discountFactor = 100;
        }
        $amount       = round($totalService->getSubTotal() * $discountFactor / 100);

        $totalData    = [
            'code'          => 'customer_discount',
            'title'         => trans('shop/carts.customer_discount'),
            'amount'        => -$amount,
            'amount_format' => currency_format(-$amount),
        ];

        $totalService->amount += $totalData['amount'];
        $totalService->totals[] = $totalData;

        return $totalData;
    }
}
