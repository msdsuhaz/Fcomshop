<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Productssize extends Model
{
    public function size(){
        return $this->belongsTo(size::class,'size_id','id');
    }
}
