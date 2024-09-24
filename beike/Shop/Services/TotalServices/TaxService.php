<?php

/**
 * TaxService.php
 *

 * @created    2022-07-27 14:24:05
 * @modified   2022-07-27 14:24:05
 */

namespace Beike\Shop\Services\TotalServices;

use Beike\Shop\Services\CheckoutService;

class TaxService
{
    /**
     * @param CheckoutService $checkout
     * @return array|null
     */
    public static function getTotal(CheckoutService $checkout): ?array
    {
//        $totalService = $checkout->totalService;
//
//        $taxes      = $totalService->taxes;
        $totalItems = [];
//        if ($taxes['totalTax'] && $taxes['totalTax'] >= 0) {
//            $totalItems[] = [
//                'code'          => 'tax',
//                'title'         => 'Tổng thuế là',
//                'amount'        => round($taxes['totalTax']),
//                'amount_format' => currency_format(round($taxes['totalTax'])),
//            ];
//            $totalService->amount += round($taxes['totalTax']);
//        }
//
//        $totalService->totals = array_merge($totalService->totals, $totalItems);

        return $totalItems;
    }
}
