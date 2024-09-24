<?php


namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeDescription extends Base
{
    use HasFactory;

    protected $fillable = ['attribute_id', 'locale', 'name'];
}
