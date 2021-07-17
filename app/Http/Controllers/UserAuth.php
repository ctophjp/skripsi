<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuth extends Controller
{
    //

    function userLogin(Request $request){
        $loginData = $request->input();
        $request->session()->put('userName', $loginData['username']);
        return redirect('dashboard');
    }
}
