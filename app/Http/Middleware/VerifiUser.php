<?php

namespace Equivalencias\Http\Middleware;

use Auth;
use Closure;

class VerifiUser
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
        if (Auth::user()->confirmed==0){
            return redirect()->route('verifi');
        }
        return $next($request);
    }
}
