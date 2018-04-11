<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Incident;

class MissingPersonInStationChecker
{
    /**
     * Checks if the missing person is in the same station with current authenticated user.
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $missing_id = substr($request->url(),-1);

        $missing = Incident::find($missing_id);

        if($missing == null || $missing->station_id != Auth::guard('officer')->user()->station_id){
          return redirect()->back();
        }
        else {
          return $next($request);
        }
    }
}
