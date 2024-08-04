<?php

namespace Beike\Shop\Services\TotalServices;

use Beike\Repositories\VouchersRepo;
use Beike\Shop\Services\CheckoutService;

class VoucherService
{
    public static function getTotal(CheckoutService $checkout): ?array
    {
        $totalService   = $checkout->totalService;
        $voucherId      = $totalService->voucherId;

//        if (! $voucherId) {
//            return null;
//        }
//        $voucher = (new VouchersRepo)->getById($voucherId);
//
//        if (! $voucher) {
//            $cart                       = $checkout->cart;
//            $cart->voucher_id           = 0;
//            $cart->saveOrFail();
//            return [];
//        }

        $totalData = [
            'code'          => 'voucher',
            'title'         => trans('shop/carts.voucher'),
            'amount'        => 12000,
            'amount_format' => currency_format(12000),
        ];

        $totalService->amount -= $totalData['amount'];
        $totalService->totals[] = $totalData;

        return $totalData;
    }
}
