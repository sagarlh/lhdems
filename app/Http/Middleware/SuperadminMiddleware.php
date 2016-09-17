<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class SuperadminMiddleware
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
        //return $request->user()->role;
        $roles = 'super-admin';
        if ($request->user()->hasRole($roles) || !$roles) {
            return $next($request);
        }

        return response([
            'error' => [
                'code' => 'INSUFFICIENT_ROLE',
                'description' => 'You are not authorized to access this resource.',
            ],
        ], 401);
    }

    private function getRequiredRoleForRoute($route)
    {
        //$actions = $route->getAction();

        //return isset($actions['roles']) ? $actions['roles'] : null;
        return 'sagar';
    }
}
