<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "address" => $this->address,
            "phone" => $this->phone,
            "isAdmin" => $this->type ? true : false
        ];
    }
}