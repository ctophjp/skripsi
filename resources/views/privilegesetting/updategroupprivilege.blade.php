@extends('layouts.main')

@section('body')
@include('template/header')
<section class="content">
    <?php 
        $sectionData = array(
            'titleIcon'     => 'fas fa-form',
            'titleLabel'    => 'Form Update',
            'colSize'       => '12',
            'isForm'        => true,
            'formAction'    => '/privilege/processupdateprivilege',
            'formMethod'    => 'POST',
            'backButton'    => true,
            'backUrl'       => '/privilege/setting'
        );
    ?>
        @include('template/messageAlert')
    <!-- section 1 -->
    @include('template/sectionheader', $sectionData)
            <?php 
                $data = array(
                    'fieldTitle'    => 'Group Name',
                    'fieldName'     => 'groupName',
                    'colSize'       => '6',
                    'value'         => $groupPrivilegeData['GROUP_NAME'],
                    'disabled'      => true
                );
            ?>
            @include('template/inputText', $data)
                
            <?php
                $data = array(
                    'fieldTitle'        => 'Hak Akses / Privilege',
                    'fieldName'         => 'listPrivilege',
                    'colSize'           => '12',
                    'checkedData'       => empty($errors->any()) ? $groupPrivilegeData['LIST_PRIVILEGE'] : old('listPrivilege'),
                    'listAllData'       => $listAllPrivilege
                );
            ?>
            @include('template/inputCheckBoxGroup', $data)

            <input type="hidden" name="groupId" value="<?= $groupPrivilegeData['GROUP_ID']; ?>">

    @include('template/sectionfooter', $sectionData)

</section>

@endsection
<?php //dump($postData);die; ?>