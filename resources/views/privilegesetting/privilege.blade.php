@extends('layouts.main')
@section('additionalcss')
<link rel="stylesheet" href="/../admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/../admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/../admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('body')
@include('template/header')

<section class="content">
    <?php 
        $sectionData = array(
            'titleIcon'     => 'fas fa-filter',
            'titleLabel'    => 'Filter',
            'colSize'       => '12',
            'headerCreateNew'   => true,
            'linkCreateNew'     => '/privilege/createnewgroupprivilege/'
        );
    ?>
    
    @include('template/messageAlert')
    <!-- section 1 -->
    @include('template/sectionheader', $sectionData)
            
            <?php 
                $data = array(
                    'fieldTitle'    => 'Nama Privilege',
                    'fieldName'     => 'namaPrivilege',
                    'colSize'       => '6',
                    'value'         => 'Test',
                );
            ?>
            @include('template/inputText', $data)

            
            <?php 
                $data = array(
                    'fieldTitle'    => 'Group Name',
                    'fieldName'     => 'groupNameFilter',
                    'colSize'       => '6',
                    'value'         => '',
                );
            ?>

            @include('template/inputText', $data)

    @include('template/sectionfooter')
                
    <!-- section 2 -->
    <?php 
        $sectionData = array(
            'titleIcon'     => 'fas fa-table',
            'titleLabel'    => 'List Privilege Group',
            'colSize'       => '12'
        );
    ?>
    @include('template/sectionheader', $sectionData)
        <?php 
            $tableData = array(
                'id'            => 'dataPrivilege',
                'headerData'    => array(
                    'Group ID',
                    'Group Name',
                    'List Privilege',
                    'Action'
                )
            )
        ?>
        
        <div class="card-body">
            @include('template/tableheader', $tableData)
            <tbody>
                <?php foreach($groupPrivilegeData as $privilege):?>
                    <tr>
                        <?php 
                        echo '<td>'.$privilege->GROUP_ID.'</td>';
                        echo '<td>'.$privilege->GROUP_NAME.'</td>';
                        ?>
                        <td> 
                            <button id="<?= $privilege->GROUP_ID; ?>" type="submit" class="btn btn-info listPrivilege" data-toggle="modal" data-target="#listPrivilege">List Priviege</button>
                        </td>
                        <td>
                            <input type='button' onClick="location.href='/privilege/updategroupprivilege/<?= $privilege->GROUP_ID; ?>'" class="btn btn-primary" value='Update Privilege'>
                        </td>

                    </tr>
                <?php endforeach;?>
            </tbody>
            @include('template/tablefooter')
        </div>
        
    @include('template/sectionfooter')

</section>

<?php 
    $modalsData = array(
        'id'        => 'listPrivilege',
        'modalTitle'=> 'List Privilege'
    );
?>
    @include('template/modalsheader', $modalsData)

      <div class="modal-body">
        <!-- Body start -->
        <div class="form-group">
            <label>Group Name</label>
            <input type="text" class="form-control" id="groupName" disabled>
        </div>
        <div class="form-group">
            <label>Hak Akses / Privilege</label>
            <select multiple class="form-control" id="privilegeData" disabled>
            </select>
        </div>
        <!-- End body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    @include('template/modalsfooter')

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
$('#dataPrivilege').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
});

$(".listPrivilege").on('click', function (event) {
    var id = this.id;
    var token = "<?php echo csrf_token();?>";
    $.ajax({
            url: '/privilege/getprivilegedata',
            method: 'post',	
            data: {
                _token: token,
                id:id
            },
            success:function(data){
                $("#groupName").val('');
                $("#privilegeData option").remove();
                
                var parse = JSON.parse(data);

                $("#groupName").val(parse.GROUP_NAME);
                jQuery.each( parse.LIST_PRIVILEGE, function( i, val ) {
                    $("#privilegeData").append(new Option(val));
                });
            }
        });
})
</script>
@endsection