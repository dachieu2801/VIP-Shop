<?php
/**
 * ProductSkuRepo.php
 *

 * @created    2022-06-23 11:19:23
 * @modified   2022-06-23 11:19:23
 */

namespace Beike\Repositories;

use Beike\Models\ProductSku;
use Illuminate\Support\Facades\DB;

class ProductSkuRepo
{
    public static function updateQuantitySold($productSkuId, $quantity): void
    {
        ProductSku::where('id', $productSkuId)->update([
            'quantity_sold' => DB::raw('quantity_sold + ' . $quantity),
            'quantity'      => DB::raw('quantity - ' . $quantity),
        ]);
    }
}
