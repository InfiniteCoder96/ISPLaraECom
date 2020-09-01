<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'name', 'description', 'category', 'main_image', 'sub_image_1', 'sub_image_2'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category', 'id');
    }
}
