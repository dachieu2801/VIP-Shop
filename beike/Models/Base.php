<?php


namespace Beike\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    protected function serializeDate(\DateTimeInterface $date): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i:s');
    }
}
