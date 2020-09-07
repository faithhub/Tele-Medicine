<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Noauth
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
        //dd(Auth::user());
        if (Auth::user()) {
            if(Auth::user()->role == 'Patient'){
                return redirect('patient/dashboard');
            }elseif(Auth::user()->role == 'Doctor'){                
                return redirect('doctor/dashboard');
            }elseif(Auth::user()->role == 'Admin'){                
                return redirect('admin/dashboard');
            }
        }
        return $next($request);
    }
}
