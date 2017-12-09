<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //productImage->product
    public function product(){
    	return $this->belongsTo(Product::class);
    }

    //Creacion de un campo calculado
    //si la ruta de la imagen empieza con http muestra la url 
    //si no muestra la imagen local
    //accessor url
    public function getUrlAttribute(){
    	if (substr($this->image, 0,4) === "http") {
    		return $this->image;
    	}

    	return '/images/products/' . $this->image;
    }
}
