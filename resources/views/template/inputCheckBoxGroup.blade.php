<?php 
    $fieldTitle         = !empty($data['fieldTitle']) ? $data['fieldTitle'] : '';
    $fieldName          = !empty($data['fieldName']) ? $data['fieldName'] : '';
    $colSize            = !empty($data['colSize']) ? $data['colSize'] : '3';
    $checkedData        = !empty($data['checkedData']) ? $data['checkedData'] : array();
    $listAllData        = !empty($data['listAllData']) ? $data['listAllData'] : array();
?>
<div class="form-group col-lg-<?=$colSize;?>">
    <label for="<?=$fieldName;?>"><?= $fieldTitle?></label>
    <?php 
        foreach($listAllData as $rowData):
            if(in_array($rowData['ID'], $checkedData)){
                $isChecked = TRUE;
            }
    ?>
        <div class="form-check">
            <input  class="form-check-input" 
                    type="checkbox" 
                    name ="<?= $fieldName; ?>[]" 
                    value="<?= $rowData['ID']; ?>" 
                    <?php echo !empty($isChecked) ? 'checked' : ''; ?>>
            <label class="form-check-label"><?= $rowData['VALUE']; ?></label>
        </div>
    <?php 
        $isChecked = FALSE;
        endforeach; 
    ?>
</div>