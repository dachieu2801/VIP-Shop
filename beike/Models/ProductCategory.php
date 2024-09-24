<?php


namespace Beike\Models;

class ProductCategory extends Base
{
    protected $table = 'product_categories';

    protected $fillable = ['product_id', 'category_id'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
