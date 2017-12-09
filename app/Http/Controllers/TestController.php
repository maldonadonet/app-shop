<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
   public function welcome(){
   	$products = Product::paginate(9);
   	//La funcion compaq crea un arreglo asociativo de nuestros datos
   	return view('welcome')->with(compact('products'));
   }
}
