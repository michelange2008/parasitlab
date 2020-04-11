<?php

namespace App\Http\Middleware;

use Closure;

class EleveurAcces
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

            if(null === auth()->user() || auth()->user()->usertype->route !== "eleveur")
            {
              return redirect()->action('AccueilController@accueil');
            }

        return $next($request);
    }
}
