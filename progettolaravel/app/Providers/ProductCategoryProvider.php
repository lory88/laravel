<?php

namespace App\Providers;

use App\Services\ProductCategoryService;
use Illuminate\Support\ServiceProvider;

class ProductCategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    //se il costruttore del servizio-> non è vuoto
    public function register()//registra nel registro dipendenze
    {
        $this->app->singleton(ProductCategoryService::class, function($app){
            return new ProductCategoryService();
        });//metodo singleton ci permette di declinare la classe
    }
    //     public function register()
    //  {
    //         $this->app->singleton(ProductCategoryService::class, function($app)
    //     });

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
