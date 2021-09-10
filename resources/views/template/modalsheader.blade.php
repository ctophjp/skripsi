<?php 
    $id = !empty($modalsData['id']) ? $modalsData['id'] : '';
    $modalsTitle = !empty($modalsData['modalTitle']) ? $modalsData['modalTitle'] : '';
?>

<div class="modal fade" id="<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $id; ?>Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="<?= $id; ?>Label"><?= $modalsTitle; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>