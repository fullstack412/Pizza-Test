<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function foods()
    {
        return $this->belongsToMany(Food::class, 'order_details')->withPivot(['quantity']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
