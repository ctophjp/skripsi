<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;


class PrivilegeModel
{
    static public function getGroupAndListPrivilegeByGroupId($groupId){
        return DB::table('m_group_privilege')
                    ->join('m_list_group_privilege', 'm_group_privilege.GROUP_ID', '=', 'm_list_group_privilege.GROUP_ID')
                    ->join('m_privilege', 'm_list_group_privilege.PRIVILEGE_ID', '=', 'm_privilege.PRIVILEGE_ID')
                    ->select('m_privilege.PRIVILEGE_NAME', 'm_privilege.PRIVILEGE_ID', 'm_group_privilege.GROUP_NAME', 'm_group_privilege.GROUP_ID')
                    ->where('m_group_privilege.GROUP_ID', '=', $groupId)
                    ->get()
                    ->toArray();
    }

    static public function getAllPrivilege(){
        return DB::table('m_privilege')
                    ->select('PRIVILEGE_ID', 'PRIVILEGE_NAME')
                    ->get()
                    ->toArray();
    }

    static public function updateUserGroupPrivilege($data){
        DB::table('m_user_privilege')
                ->where('USER_NAME', $data['userName'])
                ->update(['GROUP_ID' => $data['groupPrivilege']]);
    }

    static public function updateGroupPrivilege($groupId, $listPrivilege){
        try{
            DB::beginTransaction();

            DB::table('m_list_group_privilege')->where('GROUP_ID', '=', $groupId)->delete();
            $insertData = array();

            foreach($listPrivilege as $privilegeId){
                $insertData[] = array(
                    'GROUP_ID'      => $groupId,
                    'PRIVILEGE_ID'  => $privilegeId
                );
            }
            DB::table('m_list_group_privilege')->insert($insertData);

            DB::commit();

            return true;
        }catch(Exception $e){
            DB::rollBack();

            return false;
        }
    }

    static public function insertGroupPrivilege($data){
        try{
            DB::beginTransaction();

            $groupId    = $data['groupID'];
            $groupName  = $data['groupName'];

            DB::table('m_group_privilege')->insert([
                'GROUP_ID'      => $groupId,
                'GROUP_NAME'    => $groupName
            ]);

            $insertListPrivilege = array();

            foreach($data['listPrivilege'] as $privilegeId){
                $insertListPrivilege[] = array(
                    'GROUP_ID'      => $groupId,
                    'PRIVILEGE_ID'  => $privilegeId
                );
            }

            DB::table('m_list_group_privilege')->insert($insertListPrivilege);

            DB::commit();
            return true;
        }catch(Exception $e){
            DB::rollBack();
            return false;
        }
    }

    static public function getAllUserPrivilegeData(){
        return DB::table('m_user_data')
                    ->join('m_user_privilege', 'm_user_data.USER_NAME', '=', 'm_user_privilege.USER_NAME')
                    ->join('m_group_privilege', 'm_user_privilege.GROUP_ID', '=', 'm_group_privilege.GROUP_ID')
                    ->get()
                    ->toArray();
    }

    static public function getUserPrivilege($userName){
        return DB::table('m_user_privilege')
                    ->where('m_user_privilege.USER_NAME', '=', $userName)
                    ->get()
                    ->first();
    }

    static public function getAllGroupPriivlege(){
        return DB::table('m_group_privilege')
                    ->get()
                    ->toArray();
    }
    
}
