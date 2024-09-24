<?php


namespace Beike\Admin\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'               => $this->id,
            'name'             => $this->name,
            'code'             => $this->code,
            'continent'        => $this->continent,
            'continent_format' => trans('country.' . ($this->continent ?: 'null')),
            'sort_order'       => $this->sort_order,
            'status'           => $this->status,
            'created_at'       => time_format($this->created_at),
            'updated_at'       => time_format($this->updated_at),
        ];
    }
}
