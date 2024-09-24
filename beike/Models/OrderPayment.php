<?php


namespace Beike\Models;

class OrderPayment extends Base
{
    protected $table = 'order_payments';

    protected $fillable = [
        'order_id', 'transaction_id', 'request', 'response', 'callback', 'receipt',
    ];
}
