<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Exception;
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
            try{
            $email = Auth::user()->email;
            }
            catch(Exception $e){
                $email = "";
            }
            $cartNumber = $cartModel->cartNumber($email);
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
