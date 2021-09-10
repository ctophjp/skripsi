@extends('layouts.main')

@section('body')

@include('template/header')
<section class="content">

@include('template/messageAlert')

    <?php 
        $sectionData = array(
            'titleIcon'     => 'fas fa-form',
            'titleLabel'    => 'Form Create New User',
            'colSize'       => '12',
            'isForm'        => true,
            'formAction'    => '/user/createnew',
            'formMethod'    => 'POST'
        );
    ?>

    
    @include('template/sectionheader', $sectionData)
        
            <?php 
                $data = array(
                    'fieldTitle'    => 'User Name',
                    'fieldName'     => 'userName',
                    'colSize'       => '6',
                    'value'         =>  old('userName')
                );
            ?>
            @include('template/inputText', $data)

        <?php
                $data = array(
                    'fieldTitle'        => 'Group Privilege',
                    'fieldName'         => 'groupPrivilege',
                    'colSize'           => '6',
                    'selectedData'      => old('groupPrivilege'),
                    'listAllData'       => $allGroupPrivilege,
                    'valueID'           => 'GROUP_ID',
                    'valueName'         => 'GROUP_NAME'
                );
            ?>
            @include('template/inputSelectBox', $data)
            
            <?php 
                $data = array(
                    'fieldTitle'    => 'NIP',
                    'fieldName'     => 'NIP',
                    'colSize'       => '6',
                    'value'         =>  old('NIP')
                );
            ?>
            @include('template/inputNumber', $data)

            <?php 
                $data = array(
                    'fieldTitle'    => 'Nama',
                    'fieldName'     => 'nama',
                    'colSize'       => '6',
                    'value'         =>  old('nama')
                );
            ?>
            @include('template/inputText', $data)

            <?php 
                $data = array(
                    'fieldTitle'    => 'Jabatan',
                    'fieldName'     => 'kodeJabatan',
                    'colSize'       => '6',
                    'selectedData'  =>  old('kodeJabatan'),
                    'listAllData'   => $allJabatan,
                    'valueID'       => 'KODE_JABATAN',
                    'valueName'     => 'NAMA_JABATAN'
                );
            ?>
            @include('template/inputSelectBox', $data)
        
    @include('template/sectionfooter', $sectionData)

</section>


@endsection