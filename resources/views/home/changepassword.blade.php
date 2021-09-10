@extends('layouts.main')

@section('body')

@include('template/header')
<section class="content">

@include('template/messageAlert')

    <?php 
        $sectionData = array(
            'titleIcon'     => 'fas fa-form',
            'titleLabel'    => 'Form Change Password',
            'colSize'       => '12',
            'isForm'        => true,
            'hideBackUrl'   => true,
            'formAction'    => '/home/changepassword',
            'formMethod'    => 'POST'
        );
    ?>

    
    @include('template/sectionheader', $sectionData)
        
            <?php 
                $data = array(
                    'fieldTitle'    => 'Old Password',
                    'fieldName'     => 'oldPassword',
                    'colSize'       => '6',
                    'value'         =>  old('oldPassword')
                );
            ?>
            @include('template/inputPassword', $data)
            <div class="col-lg-6"></div>

            <?php 
                $data = array(
                    'fieldTitle'    => 'New Password',
                    'fieldName'     => 'newPassword',
                    'colSize'       => '6',
                    'value'         =>  old('newPassword')
                );
            ?>
            @include('template/inputPassword', $data)
            <div class="col-lg-6"></div>

            <?php 
                $data = array(
                    'fieldTitle'    => 'Confirm New Password',
                    'fieldName'     => 'confirmNewPassword',
                    'colSize'       => '6',
                    'value'         =>  old('confirmNewPassword')
                );
            ?>
            @include('template/inputPassword', $data)

        
    @include('template/sectionfooter', $sectionData)

</section>


@endsection