<div class="offer nopadding">
    <div class="span2-re left">
        <?php echo CHtml::image($data->contact->_img, $data->contact->first_name . " " . $data->contact->last_name, array("class" => 'img-polaroid')); ?>
    </div>
    <div class="info span10-re">
        <div class="span7-re left"><h3><?php echo $data->contact->first_name . " " . $data->contact->last_name; ?></h3></div>
        <div class="span3-re dateBig rightAlign"><?php echo $data->date_created; ?></div>
        <div class="clearfix"></div>
        <div class="span7-re left">            
            <p><b><?php echo __('Ponuda'); ?>:</b> <?php echo $data->offer; ?> RSD</p>
            <p><?php echo $data->description; ?></p>
        </div>
        <div class="span3-re">
            <?php if (!$data->checkIfAproved($data->ad_id)) { ?>
                <div class="span-mini-box rightAlign right">
                    <div class="btn-group" id="control-btns">                        
                        <?php
                        echo CHtml::link('<i class="icon-eye-open"></i> ' . __('Pogledaj oglas'), Utility::createUrl("site/ad",array("id" => $data->ad_id)), array(                            
                            "class" => "btn",
                            'csrf' => true
                                )
                        );
                        ?> 
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <hr/>
</div>