<?php

namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class SessionMenuHandler
{
    public function handle($request, Closure $next)
    {
        $sessionData = session()->get('userData');
        view()->share('sessionData', $sessionData);

        return $next($request);
    }
}
