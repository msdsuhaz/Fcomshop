<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public function product(){
        return $this->belongsTo(Products::class,'product_id','id');
    }
    public function color(){
        return $this->belongsTo(Color::class,'color_id','id');
    }
    public function size(){
        return $this->belongsTo(Size::class,'size_id','id');
    }
}
