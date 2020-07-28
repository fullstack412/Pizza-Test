<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "desc" => $this->description,
            "photos" => PhotoResource::collection($this->photos),
            "price" => $this->price,
            "rate" => $this->getRate(),
            "category" => $this->category ? $this->category->name : "",
            "categoryId" => $this->category ? $this->category->id : "",
            "comments" => CommentResource::collection($this->comments)
        ];
    }
}
