<?php


namespace Beike\Admin\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RmaReasonDetail extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'    => $this->id,
            'name'  => json_decode($this->name, true)[locale()] ?? '',
            'names' => json_decode($this->name, true),
        ];
    }
}
