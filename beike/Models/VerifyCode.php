<?php


namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerifyCode extends Base
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['account', 'code'];
}
