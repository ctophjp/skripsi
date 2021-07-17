<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Auth extends Middleware
{
    public function handle($request, Closure $next)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
        $usernameSession = $request->session()->get('userName');
        if(empty($usernameSession)){
            return redirect('login');
        }

        return $next($request);
    }
}
