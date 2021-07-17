<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('userlogin', [UserAuth::class, 'userLogin']);


Route::get('/', function () {
    return view('index');
})->middleware('authLogin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('authLogin');

Route::get('/login', function () {
    if(session()->get('userName')){
        return redirect('dashboard');
    }
    return view('login');
})->name('login');

Route::get('/logout', function(){
    if(session()->has('userName')){
        session()->flush();
    }

    return redirect('login');
});

