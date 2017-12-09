<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\product;

class ProductController extends Controller
{
   public function index(){
   		$products = Product::paginate(10);
   		return view('admin.products.index')->with(compact('products')); //Listado
   }

   public function create(){
   		return view('admin.products.create'); //formulario de registro
   }

   public function store(Request $request){
   		//Registrar el nuevo producto en la BD
   		//dd($request->all());

   		//Validaciones
   		$messages = [
   			'name.required'=>'Es necesario ingresar el nombre de un producto',
   			'name.min'=>'El nombre debe tener al menos 3 caracteres',
   			'description.required'=>'La descripcion del producto es obligatoria',
   			'description.max'=>'La cantidad maxima de caracteres es 200',
   			'price.required'=>'EL precio del producto es obligatorio',
   			'price.numeric'=>'El precio del producto debe ser un dato numerico',
   			'price.min'=>'El precio del producto no pueden ser cantidades negativas'
   		];

   		$rules =[
   			'name'=>'required|min:3',
   			'description'=>'required|max:200',
   			'price'=>'required|numeric|min:0'
   		];
   		$this->validate($request,$rules, $messages);

   		$product = new Product();
   		$product->name = $request->input('name');
   		$product->description = $request->input('description');
   		$product->price = $request->input('price');
   		$product->long_description = $request->input('long_description');
   		$product->save(); //Insert

   		return redirect('/admin/products');

   }

   public function edit($id){
   		//return "Mostrar aqui el form para la edicion del producto con el id $id";
   		$product = Product::find($id);
   		return view('admin.products.edit')->with(compact('product')); //formulario de registro
   }

   public function update(Request $request,$id){
   		//Registrar el nuevo producto en la BD
   		//dd($request->all());

   		//Validaciones
   		$messages = [
   			'name.required'=>'Es necesario ingresar el nombre de un producto',
   			'name.min'=>'El nombre debe tener al menos 3 caracteres',
   			'description.required'=>'La descripcion del producto es obligatoria',
   			'description.max'=>'La cantidad maxima de caracteres es 200',
   			'price.required'=>'EL precio del producto es obligatorio',
   			'price.numeric'=>'El precio del producto debe ser un dato numerico',
   			'price.min'=>'El precio del producto no pueden ser cantidades negativas'
   		];

   		$rules =[
   			'name'=>'required|min:3',
   			'description'=>'required|max:200',
   			'price'=>'required|numeric|min:0'
   		];
   		$this->validate($request,$rules, $messages);

   		$product = Product::find($id);
   		$product->name = $request->input('name');
   		$product->description = $request->input('description');
   		$product->price = $request->input('price');
   		$product->long_description = $request->input('long_description');
   		$product->save(); //Update

   		return redirect('/admin/products');

   }

   public function destroy($id){
   		//Registrar el nuevo producto en la BD
   		//dd($request->all());

   		$product = Product::find($id);
   		$product->delete(); //Delete

   		return back();

   }
}
