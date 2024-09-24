<?php

namespace Plugin\Bestseller\Repositories;

use Beike\Shop\Http\Resources\ProductSimple;

class ProductRepo
{
    public static function getBestSellerProducts($limit): array
    {
        $products = \Beike\Repositories\ProductRepo::getBuilder([
            'active' => 1,
            'sort'   => 'products.sales',
            'order'  => 'desc',
        ])
            ->whereHas('masterSku')
            ->limit($limit)->get();

        return ProductSimple::collection($products)->jsonSerialize();
    }
}
