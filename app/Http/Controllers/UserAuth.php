<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAuth extends Controller
{
    //

    public function userLogin(Request $request){
        $loginData = $request->input();
        $isValid = $this->validateUser($loginData);
        if($isValid){
            $loginSession   = $this->getUserPrivilege($loginData['username']);
            $userDetail     = $this->getUserData($loginData['username']);
            // dump($userDetail);die;
            $request
                ->session()
                ->put('userData', ['userName'   => $loginData['username'],
                                   'privilege'  => $loginSession,
                                   'userDetail' => $userDetail,
                                   ]
                                );
            return redirect('home/index');
        }else{
            return view('login/login', [
                'errorCode' => "04",
                'errorMsg'  => "Invalid Username or Password",
                'loginData' => $loginData
            ]);
        }
    }

    private function validateUser($loginData){
        $hashPassword = $this->hashPassword($loginData['password']);

        $users = DB::table('m_user_account')
                    ->where('USER_NAME', '=', $loginData['username'])
                    ->where('PASSWORD', '=', $hashPassword)
                    ->get()
                    ->first();

       if(!empty($users)){
           return true;
       }else{
           return false;
       }
    }

    private function hashPassword($password){
        return md5($password);
    }

    private function getUserPrivilege($userName){
        $privilege = DB::table('m_user_privilege')
                    ->join('m_group_privilege', 'm_user_privilege.GROUP_ID', '=', 'm_group_privilege.GROUP_ID')
                    ->join('m_list_group_privilege', 'm_group_privilege.GROUP_ID', '=', 'm_list_group_privilege.GROUP_ID')
                    ->select('m_list_group_privilege.PRIVILEGE_ID')
                    ->where('m_user_privilege.USER_NAME', '=', $userName)
                    ->get()
                    ->toArray();
        
        $privilegeData = array();
        foreach($privilege as $data){
            $privilegeData[] = $data->PRIVILEGE_ID;
        }
        return $privilegeData;
    }

    private function getUserData($userName){
        $userData = DB::table('m_user_data')
                    ->join('m_user_account', 'm_user_data.USER_NAME', '=', 'm_user_account.USER_NAME')
                    ->select('m_user_data.NAMA','m_user_account.IS_FIRST_LOGIN')
                    ->where('m_user_data.USER_NAME', '=', $userName)
                    ->get()
                    ->first();
        
        return $userData;
    }
}
