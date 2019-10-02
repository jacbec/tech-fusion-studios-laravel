<?php

namespace App\Http\Middleware;

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
        if ($request->user() === null)
        {
            return redirect('/')->with('alert-danger', 'You do not have the right permissions to enter that section.');
        }

        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;
        if ($request->user()->hasAnyRole($roles) || !$roles)
        {
            return $next($request);
        }
        else
        {
            return redirect('/')->with('alert-danger', 'You do not have the right permissions to enter that section.');
        }
    }
}
