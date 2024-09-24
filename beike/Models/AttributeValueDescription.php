<?php


namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeValueDescription extends Base
{
    use HasFactory;

    protected $fillable = ['attribute_value_id', 'locale', 'name'];
}
