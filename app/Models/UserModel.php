<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;


class UserModel
{
    static public function createNewUser($data){
        $password = self::generatePassword();
        try{
            DB::beginTransaction();

            DB::table('m_user_data')->insert([
                'NIP'           => $data['NIP'],
                'NAMA'          => $data['nama'],
                'KODE_JABATAN'  => $data['kodeJabatan'],
                'USER_NAME'     => $data['userName']
            ]);

            $password = $data['NIP'];
            $hashPassword = md5($password);

            DB::table('m_user_account')->insert([
                'USER_NAME'     => $data['userName'],
                'PASSWORD'      => $hashPassword,
                'CREATED_DATE'  => date('Y-m-d H:i:s'),
                'IS_FIRST_LOGIN'=> 'Y',
            ]);

            DB::table('m_user_privilege')->insert([
                'USER_NAME'     => $data['userName'],
                'GROUP_ID'      => $data['groupPrivilege'],
            ]);

            DB::commit();

            return $password;
        }catch(Exception $e){
            DB::rollBack();

            return false;
        }
    }

    static public function getListJabatan(){
        return DB::table('m_jabatan')
                    ->get()
                    ->toArray();
    }

    static public function generatePassword(){
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }
}