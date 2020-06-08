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
            <p><?php echo sprintf(__("Status: %s"), $data->_status); ?></p>            
        </div>
        <?php if ($data->status != Statuses::DELETED) { ?>
            <div class="span-mini-box rightAlign right">
                <div class="btn-group" id="control-btns">
                    <?php
                    echo CHtml::link('<i class="icon-eye-open"></i> ' . __('Pogledaj tablu sa porukama'), Utility::createUrl("site/messageBoard", array("id" => $data->ad_id)), array(
                        "class" => "btn",
                        'csrf' => true
                            )
                    );
                    ?>
                    <?php
                    echo CHtml::link('<i class="icon-trash"></i> ' . __('Obriši'), "#", array(
                        "submit" => array('profileDeleteMessage', 'id' => $data->id),
                        'confirm' => __('Da li ste sigurni da želite da obrišete poruku?'),
                        "class" => "btn",
                        'csrf' => true
                            )
                    );
                    ?>
                </div>
            </div>
        <?php } ?>
        <div class="clearfix"></div>
    </div>
</div>
<div class="clearfix"></div>
<hr/>