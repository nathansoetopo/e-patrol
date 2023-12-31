<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class IsHRDAPIMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if (request()->user()->hasRole('hrd')) {
                return $next($request);
            } else {
                return ResponseFormatter::error(null, 'Unauthorized', 403);
            }
        } else {
            return ResponseFormatter::error(null, 'Unauthenticated', 401);
        }
    }
}
