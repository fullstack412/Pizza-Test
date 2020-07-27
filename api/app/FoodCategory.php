<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    //
    protected $fillable = ['name'];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
