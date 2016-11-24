<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       if (Auth::check()){ //ログインしていなければリダイレクトされるが、顧客もアクセスできてしまう
        
    }else{
        return redirect('/pizzzzza/login');
    }

        return $next($request);
    }
}