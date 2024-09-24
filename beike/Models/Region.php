<?php


namespace Beike\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Base
{
    protected $fillable = ['name', 'description'];

    public function zones(): BelongsToMany
    {
        return $this->belongsToMany(Zone::class, 'region_zones');
    }

    public function regionZones(): HasMany
    {
        return $this->hasMany(RegionZone::class);
    }
}
