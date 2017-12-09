<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model Factory
        //Metodo make crea el objeto
        //Metodo create crea y lo coloca en la BD
        //El segundo parametro indica la cantidad de productos a crear
        /*factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();*/

        /*
            En este segundo ejemplo vamos a crear los productos fijos no aleatorios
        */

        $categories = factory(Category::class, 4)->create();
        $categories->each(function ($category){
            $products = factory(Product::class, 5)->make();
            $category->products()->saveMany($products);

            $products->each(function ($p){
                $images = factory(ProductImage::class, 3)->make();
                $p->images()->saveMany($images);
            });
        });


    }
}
