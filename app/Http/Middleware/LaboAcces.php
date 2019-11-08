<?php
/*
// Empêche l'accès à la route laboratoire à tous ce qui n'est pas identifié comme usertype laboratoire
*/
namespace App\Http\Middleware;

use Closure;

class LaboAcces
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

      if(null === auth()->user() || auth()->user()->usertype->route !== "laboratoire")
      {
        return redirect()->action('ExtranetController@accueil');
      }
        return $next($request);
    }
}
