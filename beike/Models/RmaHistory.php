<?php

namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class RmaHistory extends Base
{
    use HasFactory;

    protected $fillable = ['rma_id', 'status', 'notify', 'comment'];
}
