<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class PassMe
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
        if(Auth::user()['user_type']=='user'){
            return redirect('auth/unauthorized');
        }
        return $next($request);
    }
}
