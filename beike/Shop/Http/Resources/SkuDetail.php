<?php
/**
 * SkuDetail.php
 *
 * @copyright  2022 beikeshop.com - All Rights Reserved
 * @link       https://beikeshop.com
 * @author     TL <mengwb@guangda.work>
 * @created    2022-07-20 11:33:06
 * @modified   2022-07-20 11:33:06
 */

namespace Beike\Shop\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkuDetail extends JsonResource
{
    public function toArray($request): array
    {
        $result = [
            'id'                  => $this->id,
            'product_id'          => $this->product_id,
            'variants'            => $this->variants ?: [],
            'position'            => $this->position,
            'images'              => array_map(function ($image) {
                return [
                    'preview' => image_resize($image, 500, 500),
                    'popup'   => image_resize($image, 800, 800),
                    'thumb'   => image_resize($image, 150, 150),
                ];
            }, $this->images ?? []),
            'model'                       => $this->model,
            'sku'                         => $this->sku,
            'price'                       => $this->price,
            'price_format'                => currency_format($this->price),
            'origin_price'                => $this->origin_price,
            'origin_price_format'         => currency_format($this->origin_price),
            'quantity'                    => $this->quantity,
            'is_default'                  => $this->is_default,
            'discount'                    => round((($this->origin_price - $this->price) / $this->origin_price) * 100),
            'quantity_sold'               => $this->quantity_sold ?? 0,
            'quantity_sold_format'        => $this->format_sold_quantity($this->quantity_sold ?? 0),
        ];

        return hook_filter('resource.sku.detail', $result);
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
