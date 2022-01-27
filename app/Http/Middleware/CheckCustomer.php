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

    //constructer with seller type

    public function __construct() {
        $this->SELLER_TYPE = "seller";
    }
     
    public function handle($request, Closure $next)
    {
        if (!Auth()->user()->user == $this->SELLER_TYPE) {
            return redirect('/');
        }
        return $next($request);
    }
}
