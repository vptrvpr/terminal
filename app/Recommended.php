<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommended extends Model
{
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
