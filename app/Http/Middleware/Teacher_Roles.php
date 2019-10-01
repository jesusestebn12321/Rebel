<?php

namespace Equivalencias\Http\Middleware;

use Equivalencias\Teacher;
use Auth;
use Closure;

class Teacher_Roles
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
        $teacher=Teacher::where('user_id',Auth::user()->id)->firstOrFail();
        if ($teacher->type==1){
            return redirect('/noPermission');
           
        }
            return $next($request);
    }

}
