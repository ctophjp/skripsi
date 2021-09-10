<?php 
    $isForm     = !empty($sectionData['isForm']) ?   $sectionData['isForm'] : false;
    $backButton = !empty($sectionData['backButton']) ? $sectionData['backButton'] : false;
    $backUrl    = !empty($sectionData['backUrl']) ? $sectionData['backUrl'] : url()->previous();
    $hideBackUrl = !empty($sectionData['hideBackUrl']) ? $sectionData['hideBackUrl'] : false;
?>
    
    </div>
        <?php if($isForm == TRUE):?>
                <div class="card-footer">
                    <?php if(!$hideBackUrl) : ?>
                    <input type="button" class = "btn btn-secondary" onclick="location.href='{{ $backUrl; }}';" value="Back" />
                    &nbsp;&nbsp;
                    <?php endif; ?>
                    <input type="submit" class = "btn btn-primary">
                </div>
            </form>
        <?php endif;?>
    </div>
</section>