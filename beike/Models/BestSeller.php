<?php

namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class BestSeller extends Base
{
    use HasFactory;
    protected $fillable = ['id', 'product_id'];
}
