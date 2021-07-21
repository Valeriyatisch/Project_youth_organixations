<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;

class PMCAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role == 'client') {
            return redirect()->route('client');
        }
        if (Auth::user()->role == 'siteAdmin') {
            return redirect()->route('admin');
        }
        if (Auth::user()->role == 'PMCAdmin') {
            return $next($request);
        }
        if (Auth::user()->role == 'PMKAdmin') {
            return redirect()->route('pmk-admin');
        }
    }
}
