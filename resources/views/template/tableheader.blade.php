<?php 
    $idTable    = !empty($tableData['id']) ? $tableData['id'] : '';
    $headerData = !empty($tableData['headerData']) ? $tableData['headerData'] : array();
    

?>
<table id="<?= $idTable; ?>" class="table table-bordered table-hover">

<thead>
    <tr>
        <?php 
            foreach($headerData as $data):
        ?>
                <th><?= $data; ?></th>
        <?php 
            endforeach;
        ?>
    </tr>
</thead>