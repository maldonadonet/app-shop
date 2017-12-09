<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //$category->products
    public function products(){
    	//Indicamos hasMany que una categoria tiene muchos productos
    	return $this->hasMany(Product::class);
    }
}
