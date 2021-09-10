<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;


class UserLoginModel
{
    static public function userLoginInfo($userName){
        return DB::table('m_user_data')
                    ->join('m_user_account', 'm_user_data.USER_NAME', '=', 'm_user_account.USER_NAME')
                    ->select('m_user_data.*', 'm_user_account.LAST_LOGIN')
                    ->get();
    }
}