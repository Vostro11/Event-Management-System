<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use View;

class Client
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
        if(Auth::user()['user_type']=='client'){
            $side_menu=array('dashboard','App');
            View::share('side_menu',$slde_menu);
        }
        if(Auth::user()['user_type']!='client'){
            return redirect('auth/unauthorized');
        }
        return $next($request);
    }
}
