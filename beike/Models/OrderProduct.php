<?php

namespace Beike\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends Base
{
    protected $fillable = [
        'order_id', 'product_id', 'order_number', 'product_sku', 'name', 'image', 'quantity', 'price', 'origin_price','reviewed','review_id',
    ];

    protected $appends = ['price_format'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function productSku(): BelongsTo
    {
        return $this->belongsTo(ProductSku::class, 'product_sku', 'sku');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getPriceFormatAttribute(): string
    {
        return currency_format($this->price);
    }
}
