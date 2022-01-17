<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\CartModel;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $cartModel = new CartModel();
            $cartNumber = $cartModel->cartNumber();
            $view->with('cartNumber', $cartNumber);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
