<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
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
        if (Auth::check() && Auth::user()->admin == 0) {
          return $next($request);
        } elseif (Auth::check() && Auth::user()->admin == 1) {
          return redirect('/admin');
        } else {
          return redirect('/login');
        }
    }
}
