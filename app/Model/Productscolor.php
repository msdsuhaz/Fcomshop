<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Productscolor extends Model
{
    public function color(){
        return $this->belongsTo(color::class,'color_id','id');
    }
}
