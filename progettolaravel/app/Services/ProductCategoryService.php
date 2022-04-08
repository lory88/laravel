<?php

namespace App\Services;

use App\Http\Requests\{StoreProductCategoryRequest, UpdateProductCategoryRequest};
use App\Models\ProductCategory;
use Illuminate\Database\QueryException;


class ProductCategoryService //conterrà dei metodi per gestire la classe
{
    public function __construct()
    {

    }

    public function create(StoreProductCategoryRequest $request): ProductCategory
    {
        return ProductCategory::create([
            'name' => $request->input('name'),
            'product_category_id' => $request->input('product-category-id', null)
        ]);

    }
    
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory): ProductCategory//: ci indica cosa ci restituisce col return
    {
        $productCategory->name = $request->input('name');
        $productCategory->product_category_id = $request->input('product-category-id');
        $productCategory->save();//dico ad eloquent che dopo l'aggiornamento deve eseguire il save

        return $productCategory;
    }


public function delete(ProductCategory $productCategory)
{

    try {
        return $productCategory->delete();
    }catch(QueryException $e){
        return false;
    }

}
}
