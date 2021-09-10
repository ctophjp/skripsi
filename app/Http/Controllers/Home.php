<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserLoginModel;

class Home extends Controller
{

    public function index(Request $request){
        $userSessionData = $request->session()->get('userData')['userName'];
        $userLoginData = UserLoginModel::userLoginInfo($userSessionData);

        return view('home/index',['menuInfo'=> array('childMenu' => 'Home')]);
    }

    public function changePassword(Request $request){
        $menuInfo = array(
            'parentMenu'    => 'Setting',
            'childMenu'     => 'Change Password', 
            'menu'          => 'Change Password' 
        );
        return view('home/changepassword',['menuInfo'=> $menuInfo]);
    }

    public function processchangepassword(Request $request){
        $postData = $request->input();
        $isValid = $request->validate([
            'oldPassword'           => 'required',
            'newPassword'           => 'min:6|required_with:confirmNewPassword|same:confirmNewPassword',
            'confirmNewPassword'    => 'min:6'
        ]);
        $userName = session()->get('userData')['userName'];
        $isOldPasswordValid = $this->validateUser($userName, $postData['oldPassword']);
        if(!$isOldPasswordValid){
            return back()->withErrors('Old Password salah');
        }

        $updatePassword = $this->updatePassword($userName, $postData['newPassword']);

    }

    private function updatePassword($userName, $password){
        $hashPassword = md5($password);
        
        DB::table('m_user_account')
                ->where('USER_NAME', $userName)
                ->update(['PASSWORD' => $hashPassword]);

    }

    private function validateUser($userName, $oldPassword){
        $hashPassword = md5($oldPassword);
        $userName = $userName;

        $users = DB::table('m_user_account')
                    ->where('USER_NAME', '=', $userName)
                    ->where('PASSWORD', '=', $hashPassword)
                    ->get()
                    ->first();

       if(!empty($users)){
           return true;
       }else{
           return false;
       }
    }
}