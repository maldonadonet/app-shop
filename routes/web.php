<?php

Route::get('/', 'TestController@welcome'); //Raiz del sitio

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); //Panel de control

Route::get('/products/{id}','ProductController@show');// Vista detalle del producto

Route::post('/cart','CartDetailController@store');// Agrega un producto al carrito

Route::delete('/cart','CartDetailController@destroy');// ELimina un producto del carrito de compras

Route::post('/order','CartController@update');// Crea un nuevo pedido

//Rutas para administradores
Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
  	Route::get('/products','ProductController@index'); //Listado de productos
	Route::get('/products/create','ProductController@create'); //Formulario de registro
	Route::post('/products','ProductController@store'); //Registra el producto
	Route::get('/products/{id}/edit','ProductController@edit'); //Formulario de edicion
	Route::post('/products/{id}/edit','ProductController@update'); //Registra el producto
	Route::post('/products/{id}/delete','ProductController@destroy'); //Form eliminar

	Route::get('/products/{id}/images','ImageController@index'); //Listado de Imagenes
	Route::post('/products/{id}/images','ImageController@store'); //Registrar imagenes
	Route::delete('/products/{id}/images','ImageController@destroy'); //Form eliminar
	Route::get('/products/{id}/images/select/{image}','ImageController@select'); //Destacar una imagen

});



