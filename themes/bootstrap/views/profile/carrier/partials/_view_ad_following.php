<div class="offer nopadding">
    <div class="span2-re left">
        <?php echo CHtml::image($data->ad->_feature_image_th, $data->ad->start->name . " " . $data->ad->end->name, array("class" => 'img-polaroid small-image')); ?>
    </div>
    <div class="info span10-re">
        <div class="span7-re left"><h3><?php echo $data->ad->start->name . " - " . $data->ad->end->name; ?></h3></div>
        <div class="span3-re priceBig rightAlign"><?php echo CHtml::encode($data->ad->price); ?> <?php echo __('RSD'); ?></div>
        <div class="clearfix"></div>
        <div class="span7-re left">            
            <span class="small"><?php echo $data->ad->title; ?></span>            
            <div class="span3-re left">
                <b><?php echo CHtml::encode($data->ad->getAttributeLabel('weight')); ?>:</b>
                <?php echo CHtml::encode($data->ad->weight); ?>
                <br />
                <b><?php echo CHtml::encode($data->ad->getAttributeLabel('dimensions')); ?>:</b><br/>
                <?php echo CHtml::encode($data->ad->dimensions); ?>
            </div>
            <div class="span3-re">
                <b><?php echo CHtml::encode($data->ad->getAttributeLabel('deadline')); ?>:</b>
                <?php echo CHtml::encode($data->ad->deadline); ?>
                <br />
                <b><?php echo CHtml::encode($data->ad->getAttributeLabel('date_created')); ?>:</b><br/>
                <?php echo CHtml::encode($data->ad->date_created); ?>
            </div>
        </div>
        <div class="span3-re">
            <div class="span-mini-box rightAlign right">
                <div class="btn-group" id="control-btns">
                    <?php
                    echo CHtml::link('<i class="icon-trash"></i> ' . __('Izbaci iz praćenja'), "#", array(
                        "submit" => array('profileDeleteFollowedAd', 'id' => $data->id),
                        'confirm' => __('Da li ste sigurni da želite da izbacite ovaj oglas iz liste?'),
                        "class" => "btn",
                        'csrf' => true
                            )
                    );
                    ?>
                    <?php
                    echo CHtml::link('<i class="icon-eye-open"></i> ' . __('Pogledaj oglas'), Utility::createUrl("site/ad", array("id" => $data->ad_id)), array(
                        "class" => "btn",
                        'csrf' => true
                            )
                    );
                    ?> 
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <hr/>
</div>