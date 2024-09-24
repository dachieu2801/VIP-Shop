<?php


namespace Beike\Repositories;

use Beike\Models\Order;

class OrderTotalRepo
{
    public static function createTotals(Order $order, array $totals)
    {
        $items = [];
        foreach ($totals as $total) {
            $items[] = [
                'code'      => $total['code'],
                'value'     => $total['amount'],
                'title'     => $total['title'],
                'reference' => json_encode($total['reference'] ?? ''),
            ];
        }
        $order->orderTotals()->createMany($items);
    }
}
