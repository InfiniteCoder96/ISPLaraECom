<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingInfo extends Model
{
    public $table = 'billing_details';

    protected $fillable = [
        'user_id','order_id','fName', 'lName', 'email', 'phone', 'address', 'zipCode'
    ];

    public function Orders()
    {
        return $this->hasOne(Order::class, 'order_id');
    }
}
