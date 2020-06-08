<div class="view">    
    <div class="thumbnail-mini span2-re">        
        <?php echo CHtml::image($data->contact->_img, $data->contact->first_name . " " . $data->contact->last_name, array("class" => 'img-polaroid')); ?>
    </div>
    <div class="info span10-re">
        <span class="dateBig">            
            <?php echo __('Datum:') . " " . CHtml::encode($data->date_created); ?>
        </span>        
        <div>
            <p><?php echo $data->message; ?></p>
            <p><?php echo sprintf(__("Status: %s"),$data->_status);?></p>
        </div>
        <div class="span-mini-box rightAlign right">
            <div class="btn-group" id="control-btns">                
                <a href="<?php echo Utility::createUrl('profile/profileDeleteMessage', array("id" => $data->id)); ?>" class="btn"><i class="icon-trash"></i> <?php echo __('Obriši'); ?></a>
            </div>
        </div>        
        <div class="clearfix"></div>
    </div>
</div>
<div class="clearfix"></div>
<hr/>