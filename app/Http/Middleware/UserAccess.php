<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $userRole)
    {
        if (auth()->user()->Role == $userRole) {
            return $next($request);
        }
        return response()->json(['You do not have permission to access for this page.']);
    }
}
