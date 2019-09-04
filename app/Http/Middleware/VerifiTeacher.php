<?php

namespace Equivalencias\Http\Middleware;

use Closure;
use Auth;
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
        $matter_user=MatterUser::where('user_id','=',Auth::user()->id)->first();
        if ($matter_user->rol_teacher==1){
            return $next($request);
        }
        return redirect()->route('home');
    }
}
