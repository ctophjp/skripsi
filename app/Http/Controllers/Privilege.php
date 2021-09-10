<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PrivilegeModel;

class Privilege extends Controller
{

    public function index(){
        $privilegeGroup = $this->getPrivilegeGroup();
        $menuInfo = array(
            'parentMenu'    => 'System Setting',
            'childMenu'     => 'Privilege Setting', 
            'menu'          => 'Privilege Setting' 
        );

        return view('privilegesetting/privilege',[
                                'groupPrivilegeData' => $privilegeGroup, 
                                'menuInfo' => $menuInfo
                                ]);
    }

    public function user(){
        $menuInfo = array(
            'parentMenu'    => 'System Setting',
            'childMenu'     => 'User Privilege Setting',
            'menu'          => 'User Privilege Setting' 
        );

        $allUserPrivilegeData = PrivilegeModel::getAllUserPrivilegeData();

        return view('privilegesetting/userprivilege', [
                                'menuInfo' => $menuInfo,
                                'allUserPrivilegeData'  => $allUserPrivilegeData
        ]);
    }

    public function updateUserPrivilege($userName){
        $userPrivilegeData  = PrivilegeModel::getUserPrivilege($userName);
        $allGroupPrivilege  = PrivilegeModel::getAllGroupPriivlege();
        $menuInfo = array(
            'parentMenu'    => 'System Setting',
            'childMenu'     => 'User Privilege Setting',
            'menu'          => 'Update User Privilege',
        );

        return view('privilegesetting/updateUserPrivilege', [
                        'menuInfo' => $menuInfo,
                        'userPrivilegeData'     => $userPrivilegeData,
                        'allGroupPrivilege'    => $allGroupPrivilege
        ]);
    }

    public function processUpdateUserPrivilege(Request $request){
        $postData = $request->input();
        $isValid = $request->validate([
            'groupPrivilege'    => 'required',
            'userName'          => 'required',
        ]);

        PrivilegeModel::updateUserGroupPrivilege($postData);

        return redirect('/privilege/usersetting')->with('success', 'Proses Update Berhasil. User Name: '.$postData['userName']);   
    }

    private function getPrivilegeGroup(){
        
        $privilegeGroup = DB::table('m_group_privilege')
        ->get()
        ->toArray();

        return $privilegeGroup;
    }

    public function getprivilegedata(Request $request){
        $postData = $request->input();

        $privilege = PrivilegeModel::getGroupAndListPrivilegeByGroupId($postData['id']);

        $returnData = $this->generateListGroupPrivilegeData($privilege);
        
        echo json_encode($returnData);
    }

    public function updateGroupPrivilege($groupId){
        $menuInfo = array(
            'parentMenu'    => 'System Setting',
            'childMenu'     => 'Privilege Setting',
            'menu'          => 'Update Privilege' 
        );

        $privilegeListData  = PrivilegeModel::getGroupAndListPrivilegeByGroupId($groupId);
        
        $onlyPrivilegeId = true;

        $groupPrivilegeData = $this->generateListGroupPrivilegeData($privilegeListData, $onlyPrivilegeId);
        $listAllPrivilege   = PrivilegeModel::getAllPrivilege();

        $allPrivilege = $this->wrapListAllPrivilege($listAllPrivilege);

        return view('privilegesetting/updategroupprivilege',[
            'groupPrivilegeData'    => $groupPrivilegeData,
            'listAllPrivilege'      => $allPrivilege,
            'menuInfo'              => $menuInfo
        ]);
    }
    
    public function processupdateprivilege(Request $request){
        $postData       = $request->input();
        $groupId        = $postData['groupId'];

        $isValid = $request->validate([
            'listPrivilege' => 'required',
        ]);

        $listPrivilege  = $postData['listPrivilege'];

        $processUpdate = PrivilegeModel::updateGroupPrivilege($groupId, $listPrivilege);

        if($processUpdate){
            return redirect()->back()->with('success', 'Proses Update Berhasil');   
        }
    }

    private function generateListGroupPrivilegeData($privilege, $onlyPrivilegeId = FALSE){
        $returnData = array();
        $returnData['GROUP_NAME']   = $privilege[0]->GROUP_NAME;
        $returnData['GROUP_ID']     = $privilege[0]->GROUP_ID;
        foreach($privilege as $key => $data){
            if($onlyPrivilegeId == true){
                $returnData['LIST_PRIVILEGE'][] = $data->PRIVILEGE_ID;
            }else{
                $returnData['LIST_PRIVILEGE'][] = $data->PRIVILEGE_NAME;
            }
        }

        return $returnData;
    }

    public function createNew(){
        $menuInfo = array(
            'parentMenu'    => 'System Setting',
            'childMenu'     => 'Privilege Setting',
            'menu'          => 'Create New Group Privilege' 
        );
        
        $listAllPrivilege   = PrivilegeModel::getAllPrivilege();
        $allPrivilege = $this->wrapListAllPrivilege($listAllPrivilege);
        
        return view('privilegesetting/createnew', [
                                'menuInfo'              => $menuInfo,
                                'listAllPrivilege'      => $allPrivilege,
        ]);
    }

    public function processCreateNew(Request $request){
        $postData   = $request->input();
        // $groupId    = DB::table('m_group_privilege')->where('GROUP_ID', $postData['groupID'])->first();
        // if($groupId){

        // }

        $isValid = $request->validate([
            'groupID'   => 'required|unique:m_group_privilege,GROUP_ID',
            'groupName' => 'required',
            'listPrivilege' => 'required',
        ]);

        $processInsert = PrivilegeModel::insertGroupPrivilege($postData);

        if($processInsert){
            return redirect('/privilege/setting')->with('success', 'Proses Insert Berhasil');   
        }
    }

    private function wrapListAllPrivilege($privilegeData){
        $allPrivilege = array();
        foreach($privilegeData as $key => $privilege){
            $allPrivilege[$key]['ID']     = $privilege->PRIVILEGE_ID;
            $allPrivilege[$key]['VALUE']  = $privilege->PRIVILEGE_NAME;
        }

        return $allPrivilege;
    }

}