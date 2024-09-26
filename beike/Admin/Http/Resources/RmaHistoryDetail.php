<?php


namespace Beike\Admin\Http\Resources;

use Beike\Repositories\RmaRepo;
use Illuminate\Http\Resources\Json\JsonResource;

class RmaHistoryDetail extends JsonResource
{
    public function toArray($request): array
    {
        $statuses = RmaRepo::getStatuses();

        return [
            'id'         => $this->id,
            'rma_id'     => $this->rma_id,
            'status'     => $statuses[$this->status],
            'created_at' => time_format($this->created_at),
            'notify'     => $this->notify,
            'comment'    => $this->comment,
        ];
    }
}
