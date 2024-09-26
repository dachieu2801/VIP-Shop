<?php

namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Base
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'locale', 'image', 'sort_order', 'status'];
}
