<?php

namespace Beike\Shop\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductSimple extends JsonResource
{
    /**
     * 图片列表页Item
     *
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function toArray($request): array
    {
        $masterSku = $this->masterSku;

        if (empty($masterSku)) {
            throw new \Exception("Invalid master sku for product {$this->id}");
        }

        $name      = $this->description->name ?? '';
        $images    = $this->images;
        $discount  = 0;
        if ($masterSku->origin_price > 0) {
            $discount = round((($masterSku->origin_price - $masterSku->price) / $masterSku->origin_price) * 100);
        }
        $data = [
            'id'                          => $this->id,
            'sku_id'                      => $masterSku->id,
            'name'                        => $name,
            'name_format'                 => $name,
            'url'                         => $this->url,
            'price'                       => $masterSku->price,
            'origin_price'                => $masterSku->origin_price,
            'price_format'                => currency_format($masterSku->price),
            'origin_price_format'         => currency_format($masterSku->origin_price),
            'category_id'                 => $this->category_id           ?? null,
            'in_wishlist'                 => $this->inCurrentWishlist->id ?? 0,
            'discount'                    => $discount,
            'quantity_sold'               => $masterSku->quantity_sold ?? 0,
            'quantity_sold_format'        => $this->format_sold_quantity($masterSku->quantity_sold ?? 0),
            'images'                      => array_map(function ($item) {
                return image_resize($item, 400, 400);
            }, $images),
        ];

        return hook_filter('resource.product.simple', $data);
    }

    public function format_sold_quantity($quantity)
    {
        if ($quantity >= 1000000000) {
            return number_format($quantity / 1000000000, 1) . 'b';
        } elseif ($quantity >= 1000000) {
            return number_format($quantity / 1000000, 1) . 'm';
        } elseif ($quantity >= 1000) {
            return number_format($quantity / 1000, 1) . 'k';
        }

        return $quantity;
    }
}
