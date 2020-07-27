<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    public $timestamps = false;
    public function getPriceAttribute()
    {
        $this->attributes['price'] = Food::find($this->id) * $this->quantity;
    }
}
