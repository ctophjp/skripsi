<?php 
    $colSize    = !empty($sectionData['colSize']) ? $sectionData['colSize'] : 12;
    $titleLabel = !empty($sectionData['titleLabel']) ? $sectionData['titleLabel'] : '';
    $titleIcon  = !empty($sectionData['titleIcon']) ? $sectionData['titleIcon'] : '';
    $isForm     = !empty($sectionData['isForm']) ? $sectionData['isForm'] : false;

    $formMethod = !empty($sectionData['formMethod']) ? $sectionData['formMethod'] : '';
    $formAction = !empty($sectionData['formAction']) ? $sectionData['formAction'] : '';

    $headerCreateNew = !empty($sectionData['headerCreateNew']) ? $sectionData['headerCreateNew'] : false;
    $linkCreateNew   = !empty($sectionData['linkCreateNew']) ? $sectionData['linkCreateNew'] : '';

?>
<section class="col-lg-<?= $colSize; ?>">
    <div class="card">
        <div class="card-header">
                <h3 class="card-title">
                <i class="<?= $titleIcon; ?>"></i>
                <?= $titleLabel ?>
                </h3>
                @if($headerCreateNew == true)
                    <div class="card-tools">
                        <button onClick="location.href='<?= $linkCreateNew; ?>'" type="submit" class="btn btn-success">Create New</button>
                    </div>
                @endif
        </div>
        <?php if($isForm == TRUE):?>
            <form   action  = "<?= $formAction; ?>" 
                    method  = "<?= $formMethod; ?>">
                    @csrf
        <?php endif;?>
        <div class="card-body row">