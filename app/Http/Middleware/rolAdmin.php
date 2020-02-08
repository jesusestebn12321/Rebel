<?php

namespace Equivalencias\Http\Middleware;

use Closure;
use Auth;
class rolAdmin
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
        if (Auth::user()->hasRole(1)){
            return $next($request);
        }
        return redirect('/noPermission');
    }
}
