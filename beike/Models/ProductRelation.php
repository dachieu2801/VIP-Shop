<?php


namespace Beike\Models;

class ProductRelation extends Base
{
    protected $table = 'product_relations';

    protected $fillable = ['product_id', 'relation_id'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
