<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function payment(){
           return $this->belongsTo(payment::class,'payment_id','id');
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id','id');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class,'order_id','id');
    }
}
