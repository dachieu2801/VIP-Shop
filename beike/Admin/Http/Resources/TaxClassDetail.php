<?php


namespace Beike\Admin\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaxClassDetail extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => sub_string($this->description),
            'created_at'  => time_format($this->created_at),
            'updated_at'  => time_format($this->updated_at),
            'tax_rates'   => $this->taxRates->toArray(),
            'tax_rules'   => $this->taxRules->toArray(),
        ];
    }
}
