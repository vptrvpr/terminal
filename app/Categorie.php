<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function products(){
        return $this->hasMany('App\Product','categorie_id', 'id');
    }

    public function underCategories(){
        return $this->hasMany('App\UnderCategories','category_id', 'id');
    }
}
