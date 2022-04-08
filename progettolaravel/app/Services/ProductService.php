<?php

namespace App\Services;

use App\Http\Requests\{StoreProductRequest, UpdateProductRequest};
use App\Models\Product;
use Illuminate\Database\QueryException;


class ProductService //conterrà dei metodi per gestire la classe
{
    public function __construct()
    {

    }

    public function create(StoreProductRequest $request): Product
    {
        $path=$request->image->store('public/products');

        return Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => str_replace('public','/storage',$path),//show immagini
            'quantity' => $request->input('quantity'),
            'product_category_id' => $request->input('product-category-id', null)
        ]);

    }

    public function update(UpdateProductRequest $request, Product $product): Product//: ci indica cosa ci restituisce col return
    {

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->save();// dopo l'aggiornamento esegue il save

        return $product;
    }


    public function delete(Product $product)
    {
        try {
            return $product->delete();
        }catch(QueryException $e){
            return false;
        }
    }
}
