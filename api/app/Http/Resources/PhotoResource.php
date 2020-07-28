<?php 

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource 
{
    public function toArray($request)
    {
        return $this->getPath();
    }
}