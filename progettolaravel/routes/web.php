<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    ProductCategoryController,
    ProductController,
    Usercontroller
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () => view('welcome'));

Route::prefix('/dashboard')//product-categories verrà agganciato al dashboard
    ->middleware('auth')
    ->group(function() {
        Route::controller(DashboardController::class)
            ->group(function() { 
                Route::get('/', 'index');
            });

Route::prefix('/product-categories')
    ->controller(ProductCategoryController::class)
    ->group(function() {
        Route::delete('/{productCategory}', 'destroy');
        Route::get('/, index');
        Route::get('/create', 'create');
        Route::get('/{productCategory}/edit', 'edit');//edite modifica il form
        Route::post('/','store');//store si occupa del salvataggio
        Route::put('/{productCategory}', 'update');//update aggiorna 
        });
    });


Route::prefix('/login')
    ->controller(UserController::class)
    ->group(function(){
        Route::get('/', 'login')->name('login');
        Route::post('/', 'login'); // puntano allo stesso metodo
    });   


Route::prefix('/products')
    ->controller(ProductController::class)
    ->group(function() {
        Route::delete('/{product}', 'destroy');//collegati al controller function destroy
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/{product}/edit', 'edit');//edite modifica il form
        Route::get('/show', 'show');
        Route::post('/','store');
        Route::put('/{product}', 'update');//update aggiorna 
    });

Route::prefix('/product-categories')
    ->controller(ProductCategoryController::class)
    ->group(function() {
        Route::delete('/{productCategory}', 'destroy');//collegati al controller function destroy
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/{productCategory}/edit', 'edit');//edite modifica il form
        Route::post('/','store');//store si occupa del salvataggio
        Route::put('/{productCategory}', 'update');//update aggiorna 
    });

    Route::prefix('/signup') //raggruppato
    ->controller(UserController::class)
    ->group(function(){
        Route::get('/', 'create');// lo mandiamo sul form col metodo create
        Route::post('/', 'signup');
    });

