<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Home;
use App\Http\Controllers\Privilege;
use App\Http\Controllers\User;

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
// Route::get('userLogin', [UserAuth::class, 'userLogin'])


Route::get('/', function () {
    return view('index/index');
})->middleware('authLogin');

Route::get('/home/index', 
            [Home::class, 'index'])
    ->middleware(['authLogin', 'privilegeSession']);

Route::get('/home/changepassword', 
            [Home::class, 'changepassword'])
    ->middleware(['authLogin', 'privilegeSession']);

Route::post('/home/changepassword', 
            [Home::class, 'processchangepassword'])
    ->middleware(['authLogin', 'privilegeSession']);

Route::get('/dashboard', 
            [Dashboard::class, 'index'])
    ->name('dashboard')
    ->middleware(['authLogin', 'privilegeSession']);

Route::get('/login', function () {
    if(session()->get('userData')){
        return redirect('dashboard');
    }
    return view('login/login');
})->name('login');

Route::get('/logout', function(){
    session()->flush();

    return redirect('login');
});

// ---- PRIVILEGE ROUTING
Route::get('/privilege/setting',
            [Privilege::class, 'index'])
    ->middleware(['authLogin', 'privilegeSession']);

Route::get('/privilege/usersetting',
            [Privilege::class, 'user'])
    ->middleware(['authLogin', 'privilegeSession']);
    
Route::get('/privilege/updateuserprivilege/{userName}',
        [Privilege::class, 'updateuserprivilege'])
->middleware(['authLogin', 'privilegeSession']);

Route::post('/privilege/updateuserprivilege',
        [Privilege::class, 'processUpdateUserPrivilege'])
->middleware(['authLogin', 'privilegeSession']);

Route::post('/privilege/getprivilegedata',
            [Privilege::class, 'getprivilegedata'])
    ->middleware(['authLogin', 'privilegeSession']);

// Route::post('/privilege/updategroupprivilege',
//             [Privilege::class, 'updategroupprivilege'])
//     ->middleware(['authLogin', 'privilegeSession']);

Route::get('/privilege/updategroupprivilege/{groupId}',
            [Privilege::class, 'updategroupprivilege'])
    ->middleware(['authLogin', 'privilegeSession']);

Route::post('/privilege/processupdateprivilege',
            [Privilege::class, 'processupdateprivilege'])
    ->middleware(['authLogin', 'privilegeSession']);

Route::get('/privilege/createnewgroupprivilege',
            [Privilege::class, 'createnew'])
    ->middleware(['authLogin', 'privilegeSession']);

Route::post('/privilege/createnewgroupprivilege',
            [Privilege::class, 'processcreatenew'])
    ->middleware(['authLogin', 'privilegeSession']);


// ----USER ROUTING------
Route::get('/user/createnew',
            [User::class, 'createnew'])
    ->middleware(['authLogin', 'privilegeSession']);
Route::post('/user/createnew',
            [User::class, 'processcreatenew'])
    ->middleware(['authLogin', 'privilegeSession']);


