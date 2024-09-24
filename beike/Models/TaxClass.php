<?php

namespace Beike\Models;

class TaxClass extends Base
{
    protected $fillable = ['title', 'description'];

    public function taxRates()
    {
        return $this->belongsToMany(TaxRate::class, 'tax_rules');
    }

    public function taxRules()
    {
        return $this->hasMany(TaxRule::class);
    }
}
