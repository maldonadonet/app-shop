<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(){
    	$cart = auth()->user()->cart;
    	$cart->status = 'Pending';
    	$cart->save(); //Update

    	$notification= 'Tu pedido se ha registrado satisfactoriamente. Te contactaremos via E-mail';

    	return back()->with(compact('notification'));
    }
}
