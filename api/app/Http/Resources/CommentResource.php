<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "name" => $this->user->name,
            "photo" => $this->user->getPhotoPath(),
            "rate" => $this->rate,
            "review" => $this->review
        ];
    }
}