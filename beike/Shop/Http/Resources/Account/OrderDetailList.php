<?php
/**
 * OrderDetailList.php
 *

 * @created    2023-08-14 18:38:00
 * @modified   2023-08-14 18:38:00
 */

namespace Beike\Shop\Http\Resources\Account;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailList extends JsonResource
{
    public function toArray($request): array
    {
        $data = [
            'id'             => $this->id,
            'number'         => $this->number,
            'status_format'  => $this->status_format,
            'next_status'    => $this->getNextStatuses(),
            'status'         => $this->status,
            'total'          => $this->total,
            'total_format'   => $this->total_format,
            'created_at'     => time_format($this->created_at),
            'order_products' => OrderProductSimple::collection($this->orderProducts),
        ];

        return $data;
    }
}
