<div class="offer">
    <div class="span2-re right">
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
            <div class="rating-wrap">
                <?php
                $this->widget('CStarRating', array(
                    'name' => 'rating_' . $index . "_" . $data->contact->id,
                    'value' => $data->contact->_average_rate,
                    'readOnly' => false,
                    'resetText' => '',
                    'allowEmpty' => false,
                    'callback' => '
        function(){
                url = "' . Utility::createUrl("site/rateUser") . '";
                        jQuery.post(url, {id: ' . $data->contact->id . ', val: $(this).val()}, function(data) {
                                
                                    $("#rating_success_' . $index . "_" . $data->contact->id . '").html(data.div);
                                    $("#rating_success_' . $index . "_" . $data->contact->id . '").fadeIn("slow");              
                                    var pause = setTimeout("$(\"#rating_success_' . $index . "_" . $data->contact->id . '\").fadeOut(\"slow\")",5000);
                                    $("#rating_info_' . $data->contact->id . '").html(data.info);
                                    $("input[id*=' . $data->contact->id . '_]").rating("readOnly",true);                                
                                },"json");}'
                ));
                ?>
                <div class="rating_success" id="rating_success_<?php $index . "_" . $data->contact->id; ?>" style="display:none"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <hr/>
</div>