<?php


namespace Beike\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageProduct extends Base
{
    protected $table = 'page_products';

    protected $fillable = ['page_id', 'product_id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
