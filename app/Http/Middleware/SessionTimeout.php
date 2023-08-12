<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            config(['session.lifetime' => 1800]); // 30 minutos em segundos
        }

        return $next($request);
    }
}
