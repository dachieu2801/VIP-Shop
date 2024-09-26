<?php


namespace Beike\Models;

use Beike\Services\StateMachineService;

class OrderHistory extends Base
{
    protected $fillable = [
        'order_id', 'status', 'notify', 'comment',
    ];

    protected $appends = ['status_format'];

    public function getStatusFormatAttribute()
    {
        $statusMap = array_column(StateMachineService::getAllStatuses(), 'name', 'status');

        return $statusMap[$this->status];
    }
}
