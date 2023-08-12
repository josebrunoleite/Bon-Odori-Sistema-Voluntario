<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    public function handle($request, Closure $next)
    {

        $exception = $next($request);

        if ($request->is('login') && $request->isMethod('POST')) {
            config(['session.lifetime' => 1800]); 
        }

        return $exception;
    }
}
