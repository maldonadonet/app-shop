<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    //Relacion con el modelo CartDetail
    public function details(){
    	return $this->hasMany(CartDetail::class);
    }
}
