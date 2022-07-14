<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$types)
    {
        if (!auth()->check()) {
            return abort(401, 'Unauthorize');
        }
        if (auth()->user()->type == 'admin') {
            return $next($request);
        }
        foreach ($types as  $type) {
            if (auth()->user()->type == $type) {
                return $next($request);
            }
        }
        return abort(401, 'Unauthorize');
    }
}
