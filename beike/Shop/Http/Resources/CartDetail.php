<?php

namespace Beike\Shop\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|\JsonSerializable
     * @throws \Exception
     */
    public function toArray($request)
    {
        $sku                   = $this->sku;
        $product               = $sku->product;
        $price                 = $sku->price;
        $skuCode               = $sku->sku;
        $description           = $product->description;
        $productName           = $description->name;
        $subTotal              = $price * $this->quantity;
        $image                 = $sku->image ?: $product->image;
        $subTotal_origin_price = $sku->origin_price * $this->quantity;
        $result                = [
            'cart_id'                                 => $this->id,
            'product_id'                              => $this->product_id,
            'sku_id'                                  => $sku->id,
            'sku'                                     => $this->product_sku,
            'product_sku'                             => $skuCode,
            'name'                                    => $productName,
            'name_format'                             => sub_string($productName),
            'image'                                   => $image,
            'image_url'                               => image_resize($image),
            'quantity'                                => $this->quantity,
            'selected'                                => $this->selected,
            'price'                                   => $price,
            'shipping'                                => $this->shipping,
            'price_format'                            => currency_format($price),
            'tax_class_id'                            => $product->tax_class_id,
            'subtotal'                                => $subTotal,
            'origin_price'                            => $sku->origin_price,
            'cost_price'                              => $sku->cost_price,
            'origin_price_format'                     => currency_format($sku->origin_price),
            'sub_total_origin_price'                  => $subTotal_origin_price,
            'subtotal_format'                         => currency_format($subTotal),
            'sub_total_origin_price_format'           => currency_format($subTotal_origin_price),
            'variant_labels'                          => trim($sku->getVariantLabel()),
        ];

        return hook_filter('resource.cart.detail', $result);
    }
}
