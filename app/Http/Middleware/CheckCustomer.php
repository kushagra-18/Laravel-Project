<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCustomer {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     protected $SELLER_TYPE = 'seller';
     
    public function handle($request, Closure $next)
    {
        if (!Auth()->user()->user == 'seller') {
            return redirect('/');
        }
        return $next($request);
    }
}
