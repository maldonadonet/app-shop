<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
	//Agrega un producto al carrito
	//agrega un detalle a la tabla cartdetails
    public function store(Request $request){

    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();

    	//creamos la variable para el msj flash
    	$notification = "El producto se ha agregado al carrito no olvides visitar tu panel de control.";

    	return back()->with(compact('notification'));
    }

    //ELimina un producto del carrito 
    public function destroy(Request $request){

    	$cartDetail = CartDetail::find($request->cart_detail_id);

    	if ($cartDetail->cart_id == auth()->user()->cart->id) 
    		$cartDetail->delete();	
    	
    	//creamos la variable para el msj flash
    	$notification = "El producto se ha eliminado correctamente";

    	//enviamos como parametro la variable flash
    	return back()->with(compact('notification'));
    }
}
