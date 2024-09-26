<?php

namespace Beike\Models;

class OrderShipment extends Base
{
    protected $table = 'order_shipments';

    protected $fillable = [
        'order_id', 'express_code', 'express_company', 'express_number',
    ];
}
