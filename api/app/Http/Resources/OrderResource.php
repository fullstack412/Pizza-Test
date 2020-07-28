<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "orderDate" => $this->created_at->diffForHumans(),
            "orderId" => $this->id,
            "name" => $this->user->name,
            "address" => $this->address,
            "phoneNumber" => $this->user->phone,
            "orderDetails" => OrderDetailsResource::collection($this->foods)
        ];
    }
}