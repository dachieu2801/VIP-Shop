<?php

namespace Beike\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxRate extends Base
{
    protected $fillable = ['region_id', 'name', 'rate', 'type'];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
