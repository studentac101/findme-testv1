<?php

namespace App\Http\Middleware;

use Closure;

class ValidateBackHistory
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

      // Revalidation is triggered when the user presses the reload button.
      // It is also triggered under normal browsing
      // if the cached response includes the "Cache-control: must-revalidate" header.



      // my source to turn off cache https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Cache-Control
      $response = $next($request);
       return $response->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
           ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
    }
}
