<?php 
    $fieldTitle         = !empty($data['fieldTitle']) ? $data['fieldTitle'] : '';
    $fieldName          = !empty($data['fieldName']) ? $data['fieldName'] : '';
    $colSize            = !empty($data['colSize']) ? $data['colSize'] : '3';
    $selectedData       = !empty($data['selectedData']) ? $data['selectedData'] : array();
    $listAllData        = !empty($data['listAllData']) ? $data['listAllData'] : array();
    $valueID            = $data['valueID'];
    $valueName          = $data['valueName'];

?>
<div class="form-group col-lg-<?=$colSize;?>">
    <label for="<?=$fieldName;?>"><?= $fieldTitle?></label>
    <select class="form-control" name="<?=$fieldName;?>">
        <?php 
            foreach($listAllData as $groupPrivilege):
        ?>
        <option 
            value="<?= $groupPrivilege->$valueID ?>" 
            <?php echo ($groupPrivilege->$valueID == $selectedData) ? 'selected' : ''; ?>
        > 
        <?= $groupPrivilege->$valueName?> 
    
        </option>

        <?php
            endforeach;
        ?>
    </select>
</div>