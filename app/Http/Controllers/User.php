<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PrivilegeModel;
use App\Models\UserModel;

class User extends Controller
{
    public function createNew(){
        $menuInfo = array(
            'parentMenu'    => 'System Setting',
            'childMenu'     => 'User Privilege Setting', 
            'menu'          => 'Create New' 
        );
        
        $allGroupPrivilege  = PrivilegeModel::getAllGroupPriivlege();
        $allJabatan         = UserModel::getListJabatan();

        return view('user/createnew',[
                    'menuInfo'          => $menuInfo,
                    'allGroupPrivilege' => $allGroupPrivilege,
                    'allJabatan'        => $allJabatan
            ]);
    }

    public function processCreateNew(Request $request){
        $postData = $request->input();

        $request->validate([
            'userName'      => 'required|unique:m_user_account,USER_NAME',
            'NIP'           => 'required|unique:m_user_data,NIP',
            'groupPrivilege'=> 'required',
            'nama'          => 'required',
            'kodeJabatan'   => 'required'
        ]);

        UserModel::createNewUser($postData);

        return redirect('/privilege/usersetting')->with('success', 'Proses Buat User Berhasil. Username: '.$postData['userName']);

    }
}