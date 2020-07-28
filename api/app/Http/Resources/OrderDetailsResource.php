<?php 

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "foodId" => $this->id,
            "name" => $this->name,
            "amount" => $this->pivot->quantity,
            "price" => $this->price,
            "category" => $this->category ? $this->category->name : "",
            "categoryId" => $this->category ? $this->category->id : ""
        ];
    }
}