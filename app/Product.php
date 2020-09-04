<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'category', 'price', 'main_image', 'sub_image_1', 'sub_image_2'
    ];

    public function Category()
    {
        return $this->belongsTo(ProductCategory::class, 'category');
    }

    public function Cart()
    {
        return $this->hasMany(Cart::class, 'id');
    }

    public function Orders()
    {
        return $this->hasMany(Order::class, 'id');
    }
}
