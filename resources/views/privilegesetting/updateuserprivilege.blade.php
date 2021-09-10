@extends('layouts.main')

@section('body')
@include('template/header')
<section class="content">
@include('template/messageAlert')
    <?php 
        $sectionData = array(
            'titleIcon'     => 'fas fa-form',
            'titleLabel'    => 'Form Update',
            'colSize'       => '12',
            'isForm'        => true,
            'formAction'    => '/privilege/updateuserprivilege',
            'formMethod'    => 'POST',
            'backButton'    => true,
            'backUrl'       => '/privilege/usersetting'
        );
    ?>
    
    @include('template/sectionheader', $sectionData)
            <?php 
                $data = array(
                    'fieldTitle'    => 'User Name',
                    'fieldName'     => 'userName',
                    'colSize'       => '6',
                    'value'         => $userPrivilegeData->USER_NAME,
                    'disabled'      => true
                );
            ?>
            @include('template/inputText', $data)
                
            <?php
                $data = array(
                    'fieldTitle'        => 'Group Privilege',
                    'fieldName'         => 'groupPrivilege',
                    'colSize'           => '6',
                    'selectedData'      => empty($errors->any()) ? $userPrivilegeData->GROUP_ID : old('groupPrivilege'),
                    'listAllData'       => $allGroupPrivilege,
                    'valueID'           => 'GROUP_ID',
                    'valueName'         => 'GROUP_NAME'
                );
            ?>
            @include('template/inputSelectBox', $data)

            <input type="hidden" name="userName" value="<?= $userPrivilegeData->USER_NAME; ?>">

    @include('template/sectionfooter', $sectionData)

</section>

@endsection