<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProductMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        abort_if(auth()->id() != 1 && auth()->user()->product_permission != 2, 403);
        return $next($request);
    }
}
