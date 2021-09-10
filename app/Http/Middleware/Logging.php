<?php

namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Logging
{
    public function handle($request)
    {
        dump(123);die;
    }
}
