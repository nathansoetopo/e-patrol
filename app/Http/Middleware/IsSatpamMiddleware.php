<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSatpamMiddleware
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
        if(Auth::check())
        {
            if(request()->user()->hasRole('satpam'))
            {
                return $next($request);
            }
            elseif(request()->user()->hasRole('hrd'))
            {
                return redirect('hrd')->with('status','Anda bukan satpam');
            }
            elseif(request()->user()->hasRole('admin'))
            {
                return redirect('admin')->with('status','Anda bukan satpam');
            }
        }
        return redirect('/')->with('status','Anda belum login');
    }
}
