<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class checkAge
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
      
      $age = Auth::User()->age;
      if($age < 15) {
        return redirect()->route('backing');
      }

        return $next($request);
    }
}
