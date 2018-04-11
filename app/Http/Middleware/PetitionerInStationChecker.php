<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

use App\Petitioner;

class PetitionerInStationChecker
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
      // get the last character of the url, because the last character will be the petitioner ID
      $petitioner_id = substr($request->url(),-1);

      $petitioner = Petitioner::find($petitioner_id);
      if($petitioner == null || $petitioner->station_id != Auth::guard('officer')->user()->station_id){
        return redirect()->back();
      }
      else{
        return $next($request);
      }
    }
}
