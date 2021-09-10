<?php 
    $fieldTitle = !empty($data['fieldTitle']) ? $data['fieldTitle'] : '';
    $fieldName  = !empty($data['fieldName']) ? $data['fieldName'] : '';
    $colSize    = !empty($data['colSize']) ? $data['colSize'] : '3';
    $value      = !empty($data['value']) ? $data['value'] : '';
    $disabled   = !empty($data['disabled']) ? 'disabled' : '';
?>
<div class="form-group col-lg-<?=$colSize;?>">
    <label for="<?=$fieldName;?>"><?= $fieldTitle?></label>
    <input  type        = "password" 
            class       = "form-control" 
            id          = "<?= $fieldName; ?>" 
            name        = "<?= $fieldName; ?>" 
            value       = "<?= $value; ?>" 
            placeholder = "<?= $fieldTitle;  ?>"
            <?= $disabled; ?>
            >
</div>