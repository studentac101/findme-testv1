<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class LoggedIn
{
    /**
     * Handle an incoming request.
     * THIS MIDDLEWARE WILL PREVENT THE USER TO GO BACK TO THE LOG IN PAGE IF HE'S STILL LOGGED IN
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'officer')
    {
      if(Auth::guard($guard)->check()){
        return redirect()->back();
      }
      else {
        return $next($request);
      }

    }
}
