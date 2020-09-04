<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'product_id', 'quantity'
    ];

    public function Users()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function Products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
