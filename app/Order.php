<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id', 'user_id', 'product_id', 'quantity', 'paymentTYpe'
    ];

    public function Products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function Users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function BillingInfo()
    {
        return $this->belongsTo(BillingInfo::class, 'order_id');
    }

}
