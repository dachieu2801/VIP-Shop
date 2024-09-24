<?php


namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeGroupDescription extends Base
{
    use HasFactory;

    protected $fillable = ['attribute_group_id', 'locale', 'name'];
}
