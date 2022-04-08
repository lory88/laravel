<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;
use App\Services\ProductCategoryService;
use Illuminate\Database\QueryException;

class ProductCategoryController extends Controller
{
    public function __construct(private ProductCategoryService $_productCategoryService)
    {
        //var_damp($this->$_productCategoryService); die();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product-category.index', [
            'categories' => ProductCategory::with('productCategory')->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('product-category.create', [
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {
        // $category = new ProductCategory();
        // $category->name = $request->input('name');
        // $category->category_id = $request->input('product-category', null);

        // $category->save(); //procede con il salvataggio nella banca dati
        // //$(request->all()) per recuperare tutti i campi
        // dd($request->input('name'));//nome campo input
        // die();

        $category = $this->_productCategoryService->create($request);

        return redirect('/product-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('product-category.edit',[
            'categories' => ProductCategory::all(),
            'productCategory' => $productCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductCategoryRequest  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $this->_productCategoryService->update($request, $productCategory);
        return redirect('/product-categories');//cosi ritorna all'elenco
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        
        $productCategory = $this->_productCategoryService->delete($productCategory);
        
        return !$productCategory ? redirect('/product-categories')->with([
            'action' => 'destroy',
            'hasError'=>$hasError = true
        ]) : redirect('product-categories')->with([
            'productCategory' =>$productCategory
        ]);
    }
}