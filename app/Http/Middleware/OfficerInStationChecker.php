<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Officer;

class OfficerInStationChecker
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
        $officer_id = substr($request->url(),-1);
        // dd($officer_id);
        $officer = Officer::find($officer_id);

        if($officer == null || $officer->station_id != Auth::guard('officer')->user()->station_id){
          return redirect()->back();
        }
        else {
          return $next($request);
        }
    }
}
