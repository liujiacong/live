<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Checkhas_store
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
        if(Auth::user()->has_store==0){
          return redirect('/user/me');
        }
        return $next($request);
    }
}
