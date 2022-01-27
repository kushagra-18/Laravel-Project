<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

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
            $cartModel = new Cart();
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
