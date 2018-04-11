<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class OfficerType
{
    /**
     * Handle an incoming request.
     * THIS MIDDLEWARE WILL ONLY ALLOW SPECIFIC LINKS FOR THE HEAD OFFICER
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'officer')
    {
      // if the officer type is a head officer it will proceed to the request
      if(Auth::guard($guard)->user()->officer_type == 0){
        return $next($request);
      }
      else {
        return redirect()->back();
      }
    }
}
