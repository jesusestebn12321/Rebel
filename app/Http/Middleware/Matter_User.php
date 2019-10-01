<?php

namespace Equivalencias\Http\Middleware;

use Equivalencias\Teacher;
use Auth;
use Closure;

class Matter_User
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
        $matter_teacher=Teacher::where('user_id',Auth::user()->id)->firstOrFail();
        if ($matter_teacher->admin_confirmed==0){
            return redirect()->route('admin-verify');
        }
            return $next($request);
    }
}
