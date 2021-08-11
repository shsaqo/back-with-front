<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HomeMiddleware
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
        abort_if(auth()->id() != 1 && auth()->user()->home_permission == 0, 403);
        return $next($request);
    }
}
