@extends('layouts.main')

@section('body')
@include('template/header')

<section class="content">
    <?php 
        $sectionData = array(
            'titleIcon'     => 'fas fa-form',
            'titleLabel'    => 'Form Create',
            'colSize'       => '12',
            'isForm'        => true,
            'formAction'    => '/privilege/createnewgroupprivilege',
            'formMethod'    => 'POST'
        );
    ?>
        @include('template/messageAlert')
        
    @include('template/sectionheader', $sectionData)
        <!-- Form Data -->
            <?php 
                $data = array(
                    'fieldTitle'    => 'Group ID',
                    'fieldName'     => 'groupID',
                    'colSize'       => '6',
                    'value'         =>  !empty(old('groupID')) ? old('groupID') : ''
                );
            ?>
            @include('template/inputText', $data)

            <?php 
                $data = array(
                    'fieldTitle'    => 'Group Name',
                    'fieldName'     => 'groupName',
                    'colSize'       => '6',
                    'value'         =>  old('groupName')
                );
            ?>
            @include('template/inputText', $data)

            <?php
                $data = array(
                    'fieldTitle'        => 'Hak Akses / Privilege',
                    'fieldName'         => 'listPrivilege',
                    'colSize'           => '12',
                    'checkedData'       => old('listPrivilege'),
                    'listAllData'       => $listAllPrivilege
                );
            ?>
            @include('template/inputCheckBoxGroup', $data)

        <!-- End Form Data -->

    
    @include('template/sectionfooter', $sectionData)

</section>

@endsection