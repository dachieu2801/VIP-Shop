<?php


namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class RmaReason extends Base
{
    use HasFactory;

    protected $fillable = ['locale', 'name'];
}
