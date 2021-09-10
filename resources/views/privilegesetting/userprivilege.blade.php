@extends('layouts.main')
@section('additionalcss')
<link rel="stylesheet" href="/../admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/../admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/../admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('body')
@include('template/header')
<section class="content">
    @include('template/messageAlert')
    
    <?php 
        $sectionData = array(
            'titleIcon'     => 'fas fa-table',
            'titleLabel'    => 'List User Data',
            'colSize'       => '12',
            'headerCreateNew'   => true,
            'linkCreateNew'     => '/user/createnew/'
        );
    ?>
        @include('template/sectionheader', $sectionData)
        <?php 
            $tableData = array(
                'id'            => 'userPrivilegData',
                'headerData'    => array(
                    'NIP',
                    'Nama',
                    'Kode Jabatan',
                    'User Name',
                    'Group Name',
                    'Action'
                )
            )
        ?>
        
        <div class="card-body">
            @include('template/tableheader', $tableData)
            <tbody>
                <?php foreach($allUserPrivilegeData as $userData):?>
                    <tr>
                        <?php 
                        echo '<td>'.$userData->NIP.'</td>';
                        echo '<td>'.$userData->NAMA.'</td>';
                        echo '<td>'.$userData->KODE_JABATAN.'</td>';
                        echo '<td>'.$userData->USER_NAME.'</td>';
                        echo '<td>'.$userData->GROUP_NAME.'</td>';
                        ?>
                        <td>
                            <input type='button' onClick="location.href='/privilege/updateuserprivilege/<?= $userData->USER_NAME; ?>'" class="btn btn-primary" value='Update Privilege'>
                        </td>

                    </tr>
                <?php endforeach;?>
            </tbody>
            @include('template/tablefooter')
        </div>
        
    @include('template/sectionfooter')
</section>

@endsection


@section('additionaljs')
<script src="/../admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/../admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/../admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/../admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/../admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/../admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/../admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/../admin-lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/../admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
$('#userPrivilegData').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
});
</script>
@endsection