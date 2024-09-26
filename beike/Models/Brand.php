<?php

namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Base
{
    use HasFactory;

    protected $fillable = ['name', 'first', 'logo', 'sort_order', 'status'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getUrlAttribute()
    {
        $url     = shop_route('brands.show', ['id' => $this->id]);
        $filters = hook_filter('model.brand.url', ['url' => $url, 'brand' => $this]);

        return $filters['url'] ?? '';
    }
}
