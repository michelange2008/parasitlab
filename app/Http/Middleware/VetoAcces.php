<?php

namespace App\Http\Middleware;

use Closure;

class VetoAcces
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

            if(null === auth()->user() || auth()->user()->usertype->route !== "veterinaire")
            {
              return redirect()->action('AccueilController@accueil');
            }

        return $next($request);
    }
}
