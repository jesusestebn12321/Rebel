<?php

namespace Equivalencias\Http\Middleware;

use Closure;
use Auth;
use Equivalencias\Teacher;
class VerifiTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $matter_user=Teacher::where('user_id','=',Auth::user()->id)->first();
        if ($matter_user->rol_id==2){
            return $next($request);
        }
        return redirect()->route('home');
    }
}
