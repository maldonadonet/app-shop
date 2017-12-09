<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //$product->category; Conocer la categoria de una producto
    public function category(){
    	//Un producto pertenece a una categoria
    	return $this->belongsTo(Category::class);
    }

    //$product->images
    public function images(){

    	return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute(){
    	$featuredImage = $this->images()->where('featured',true)->first();
    	if (!$featuredImage)
    		$featuredImage = $this->images()->first();

    	if($featuredImage){
    		return $featuredImage->url;
    	}

    	//imagen por default
    	return '/images/products/default.gif';
    }
}
