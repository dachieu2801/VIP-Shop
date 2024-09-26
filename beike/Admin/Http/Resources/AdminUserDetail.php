<?php


namespace Beike\Admin\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminUserDetail extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'email'      => $this->email,
            'locale'     => $this->locale,
            'roles'      => $this->roles,
            'roles_name' => $this->roles->pluck('name')->toArray(),
            'created_at' => time_format($this->created_at),
            'updated_at' => time_format($this->updated_at),
        ];
    }
}
