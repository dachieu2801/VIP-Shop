<?php

namespace Beike\Models;

class RegionZone extends Base
{
    protected $fillable = ['region_id', 'country_id', 'zone_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
