<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Auth extends Middleware
{
    public function handle($request, Closure $next)
    {
        $userdataSession = $request->session()->get('userData');
        
        if(empty($userdataSession)){
            return redirect('login');
        }else{
            if($userdataSession['userDetail']->IS_FIRST_LOGIN == 'N'){
                return $next($request);
            }else{
                if($request->path() == 'home/changepassword'){
                    return $next($request);
                }else{
                    return redirect('home/changepassword');
                }
            }
        }
    }
}