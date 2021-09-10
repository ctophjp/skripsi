<?php
    $mainTitle  = !empty($data['mainTitle']) ? $data['mainTitle'] : '';
    $colPerRow  = !empty($data['colPerRow']) ? $data['colPerRow'] : 1;
    $bodyData   = !empty($data['body']) ? $data['body'] : array();
    $colSize    = 12/$colPerRow;
    $countData  = count($bodyData);
    $countPritendData = 0;

?>

<section class="col-lg-12">
    <div class="card">
        <div class="card-header">
                <h3 class="card-title">
                <i class="fas fa-filter"></i>
                <?= $mainTitle; ?>
                </h3>
        </div>
        <?php foreach($bodyData as $key => $data){
                if($key == 0 || $countPritendData == 0){
            ?>
                    <div class="card-body row"> 
                <?php }?>
                    
                        <div class="form-group col-lg-<?= $colSize;?>">
                            <label for="">Nama Privilege</label>
                            <input type="text" class="form-control" id="" placeholder="Nama Privilege">
                        </div>

                <?php 
                
                $countPritendData++;
                if($countPritendData == $colPerRow || empty($bodyData[$key+1])){ $countPritendData = 0;?>
                    
                    </div> 
                
                <?php }?>
        <?php }?>
    </div>
</section>