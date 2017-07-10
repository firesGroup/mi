<?php

namespace App\Http\Middleware;

use Closure;

class PonseralMiddleware
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
        if(session('user_deta') == null){
            return redirect('/login');
        }else{
            return $next($request);
        }

    }
}
