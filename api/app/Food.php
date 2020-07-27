<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'price', 'category_id'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(FoodCategory::class, 'category_id');
    }

    public function getRate()
    {
        $currencyRate = 0;

        foreach ($this->comments as $comment)
        {
            $currencyRate = $comment->rate;
        }

        return $this->comments->count() == 0 ? 5 : ceil($currencyRate/$this->comments->count());
    }
}
