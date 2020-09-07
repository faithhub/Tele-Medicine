<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class Approved
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
        if (Auth::user()) {
            if (Auth::user()->role == 'Doctor' && Auth::user()->status == 'Inactive') {
                Auth::logout();
                Session::flash('warning', 'Your Account is Inactive');
                return redirect('login');
            } elseif (Auth::user()->role == 'Doctor' && Auth::user()->status == 'Pending') {
                Auth::logout();
                Session::flash('warning', 'Your Account is Pending Approve');
                return redirect('login');
            }
        }
        return $next($request);
    }
}
