<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyAdminLogin
{

    public function handle($request, Closure $next)
    {
        if ( !session()->has('isLogin') || !session()->get('isLogin')) {
            return redirect('/signin');
        }

        return $next($request);
    }
}
