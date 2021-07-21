<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;

class SiteAdmin
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
            return $next($request);
        }
        if (Auth::user()->role == 'PMCAdmin') {
            return redirect()->route('pmc-admin');
        }
        if (Auth::user()->role == 'PMKAdmin') {
            return redirect()->route('pmk-admin');
        }
    }
}
