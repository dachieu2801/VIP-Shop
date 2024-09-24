<?php


namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Zone extends Base
{
    use HasFactory;

    protected $fillable = ['country_id', 'name', 'code', 'sort_order', 'status'];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
