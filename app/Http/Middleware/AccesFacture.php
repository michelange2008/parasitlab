<?php

namespace App\Http\Middleware;

use Closure;

class AccesFacture
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      dd($request->all());

        return $next($request);
    }
}
