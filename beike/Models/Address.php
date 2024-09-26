<?php

namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Base
{
    use HasFactory;

    protected $fillable = ['customer_id', 'name', 'phone', 'country_id', 'zone_id', 'zone', 'city_id', 'city', 'zipcode', 'address_1', 'address_2'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }
}
