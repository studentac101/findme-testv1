<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckIfLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

      // this will check if the user is logged in or not if yes it will continue to the request.
       // if not it will redirect the intruder to the login page

    public function handle($request, Closure $next, $guard = 'officer')
    {
        if(Auth::guard($guard)->check()){
          return $next($request);
        }
        else{
          return redirect('/');
        }
    }
}
