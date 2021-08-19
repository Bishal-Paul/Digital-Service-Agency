<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
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
        if(session('type') === 'ADMIN'){
            return redirect()->route('/login');
        }
        elseif(session('type') === 'VENDOR'){
            //session()->flash();
            return redirect()->route('login');
        }
        else{
            //session()->flash();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
