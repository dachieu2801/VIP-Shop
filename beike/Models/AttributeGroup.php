<?php


namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttributeGroup extends Base
{
    use HasFactory;

    protected $fillable = ['sort_order'];

    public function description()
    {
        return $this->hasOne(AttributeGroupDescription::class)->where('locale', locale());
    }

    public function descriptions(): HasMany
    {
        return $this->hasMany(AttributeGroupDescription::class);
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(Attribute::class);
    }
}
