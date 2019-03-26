<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\
 */
class Product extends Model
{
    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }

    public function specifications(){
    return $this->hasMany(Specification::class,'product_id','id');
}
}
