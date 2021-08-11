<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectMiddleware
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
        if (auth()->id() != 1 && auth()->user()->product_permission == 0) {
            if (auth()->id() != 1 && auth()->user()->special_permission != 0) {
                return redirect()->route('thankYou.create');
            }
            elseif (auth()->id() != 1 && auth()->user()->home_permission != 0) {
                return redirect()->route('home-product.index');
            }
            auth()->logout();
            abort(403);
        }
        return $next($request);
    }
}
