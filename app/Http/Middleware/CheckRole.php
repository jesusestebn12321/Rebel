<?php

namespace Equivalencias\Http\Middleware;

use Closure;
class CheckRole
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
        $rol = $this->getRequiredRoleForRute($request->route());
        if ($request->user()->hasRole($rol) || !$rol){
            return $next($request);
        }
        return redirect('/noPermission');

    }
    private function getRequiredRoleForRute($route){
        $actions = $route->getAction();
        return isset($actions['rol']) ? $actions['rol'] : null;
    }
}
