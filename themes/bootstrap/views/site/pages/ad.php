<h2 class="title-bar dark"><?php echo __("Detalji oglasa"); ?></h2>
<div id="inner-content">
    <div class="left">
        <?php
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
            'stacked' => false, // whether this is a stacked menu
            'htmlOptions' => array(
                'class' => 'inner-nav ad-inner-nav'
            ),
            'items' => array(
                array('label' => __('Nađi od istog oglašivača'), 'icon' => 'user white', 'url' => array("site/ads", "contact_id" => $model->contact_id), 'linkOptions' => array('target' => '_BLANK')),
                array('label' => __('Prati oglas'), 'icon' => 'thumbs-up white', 'url' => array("site/adFollow", "id" => $model->id), 'visible' => Yii::app()->customer->isCarrier && $model->checkFollowed()),
                array('label' => __('Prijavi oglas'), 'icon' => 'thumbs-down white', 'url' => '#', 'linkOptions' => array('data-toggle' => 'modal', 'data-target' => '#reportModal')),
                array('label' => __('Pošalji prijatelju'), 'icon' => 'envelope white', 'url' => '#', 'linkOptions' => array('data-toggle' => 'modal', 'data-target' => '#sendModal')),
                array('label' => __('Tabla sa porukama'), 'icon' => 'tasks white', 'url' => array("site/messageBoard", "id" => $model->id), 'visible' => (Yii::app()->customer->isCarrier) ? true : ((Yii::app()->customer->isAdvertiser && $model->contact_id == Yii::app()->customer->id) ? true : false)),
                array('label' => __('Štampaj oglas'), 'icon' => 'print white', 'url' => array("site/printAd", "id" => $model->id), 'linkOptions' => array('target' => '_BLANK')),
            ),
        ));
        ?>
        <?php if (Yii::app()->customer->hasFlash('success')) { ?>
            <div class="alert in alert-block fade alert-success">
                <?php echo Yii::app()->customer->getFlash('success'); ?>
            </div>
        <?php } ?>
        <?php if (Yii::app()->customer->hasFlash('error')) { ?>
            <div class="alert in alert-block fade alert-error">
                <?php echo Yii::app()->customer->getFlash('error'); ?>
            </div>
        <?php } ?>
    </div>
    <div class="clearfix"></div>
    <div class="span6-re left">
        <div class="span3-re left">
            <h2 class="title-small"><?php echo $model->start->name . '-' . $model->end->name; ?></h2>
            <span class="small"><?php echo $model->title; ?></span>
            <div class="single-info">
                <b><?php echo CHtml::encode($model->getAttributeLabel('price')); ?>:</b>
                <?php echo CHtml::encode($model->price); ?> <?php echo __('RSD'); ?><br/>
                <b><?php echo CHtml::encode($model->getAttributeLabel('weight')); ?>:</b>
                <?php echo CHtml::encode($model->weight); ?><br/>
                <b><?php echo CHtml::encode($model->getAttributeLabel('dimensions')); ?>:</b>
                <?php echo CHtml::encode($model->dimensions); ?><br/>
                <b><?php echo CHtml::encode($model->getAttributeLabel('deadline')); ?>:</b>
                <?php echo CHtml::encode($model->deadline); ?><br />
                <b><?php echo CHtml::encode($model->getAttributeLabel('date_created')); ?>:</b>
                <?php echo CHtml::encode($model->date_created); ?>        
            </div>
        </div>        
        <div class="span3-re">
            <div id="contact-info">
                <h2 class="title-small"><?php echo __('Oglas postavio'); ?></h2>
                <?php echo CHtml::image($model->contact->_img, $model->contact->first_name . " " . $model->contact->last_name, array("class" => 'img-polaroid')); ?>
                <span class="small"><?php echo $model->contact->first_name . " " . $model->contact->last_name; ?></span>
            </div>
            <div id="rating-wrapper">
                <span class="small"><?php echo __('Prosečna ocena:'); ?></span>
                <span id="total_mark"><?php echo $model->contact->_average_rate; ?></span>
                <?php
                $this->widget('CStarRating', array(
                    'name' => 'rating' . $model->contact->id,
                    'value' => (!empty($model->contact->_average_rate)) ? $model->contact->_average_rate : 0,
                    'readOnly' => false,
                    'allowEmpty' => false,
                    'resetText' => '',
                    'callback' => '
        function(){
                url = "' . Utility::createUrl("site/rateUser") . '";
                        jQuery.post(url, {id: ' . $model->contact->id . ', val: $(this).val()}, function(data) {
                                if (data.status == "success"){
                                        $("#rating_success_' . $model->contact->id . '").html(data.div);
                                        $("#rating_success_' . $model->contact->id . '").fadeIn("slow");              
                                        var pause = setTimeout("$(\"#rating_success_' . $model->contact->id . '\").fadeOut(\"slow\")",5000);
                                        $("#rating_info_' . $model->contact->id . '").html(data.info);
                                        $("input[id*=' . $model->contact->id . '_]").rating("readOnly",true);
                                }else{
                                        $("#rating_success_' . $model->contact->id . '").html(data.div);
                                        $("#rating_success_' . $model->contact->id . '").fadeIn("slow");              
                                        var pause = setTimeout("$(\"#rating_success_' . $model->contact->id . '\").fadeOut(\"slow\")",5000);
                                        $("#rating_info_' . $model->contact->id . '").html(data.info);
                                        $("input[id*=' . $model->contact->id . '_]").rating("readOnly",true);  
                                }
                                },"json");}'
                ));
                ?>
                <div class="clearfix"></div>
                <div id="rating_success_<?= $model->contact->id; ?>" style="display:none"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr/>
        <div id="description">
            <h3 class="title-small"><?php echo __('Opis'); ?></h3>
            <p><?php echo CHtml::encode($model->description); ?></p>
        </div>
    </div>
    <div class="span6-re rightAlign">
        <div id="gallery">
            <div id="gallery2" class="flexslider">
                <ul class="slides">
                    <?php
                    if (!empty($model->img_1)) {
                        ?>
                        <li id="pic_img1">
                            <img src="<?php echo $model->_img1; ?>"  />        
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_2)) {
                        ?>
                        <li id="pic_img2">
                            <img src="<?php echo $model->_img2; ?>"  />        
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_3)) {
                        ?>
                        <li id="pic_img3">
                            <img src="<?php echo $model->_img3; ?>"  />        
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_4)) {
                        ?>
                        <li id="pic_img4">
                            <img src="<?php echo $model->_img4; ?>"  />        
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_5)) {
                        ?>
                        <li id="pic_img5">        
                            <img src="<?php echo $model->_img5; ?>"  />                
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_6)) {
                        ?>
                        <li id="pic_img6">
                            <img src="<?php echo $model->_img6; ?>"  />                
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_7)) {
                        ?>
                        <li id="pic_img7">        
                            <img src="<?php echo $model->_img7; ?>"  />                
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_8)) {
                        ?>
                        <li id="pic_img8">        
                            <img src="<?php echo $model->_img8; ?>"  />                
                        </li>
                        <?php
                    }
                    ?>                    
                </ul>
            </div>
            <div id="carousel" class="flexslider">
                <ul class="slides" id="slider_nav">
                    <?php
                    if (!empty($model->img_1)) {
                        ?>
                        <li id="pic_img1">
                            <img src="<?php echo $model->_img1_th; ?>"  />        
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_2)) {
                        ?>
                        <li id="pic_img2">
                            <img src="<?php echo $model->_img2_th; ?>"  />        
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_3)) {
                        ?>
                        <li id="pic_img3">
                            <img src="<?php echo $model->_img3_th; ?>"  />        
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_4)) {
                        ?>
                        <li id="pic_img4">
                            <img src="<?php echo $model->_img4_th; ?>"  />        
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_5)) {
                        ?>
                        <li id="pic_img5">        
                            <img src="<?php echo $model->_img5_th; ?>"  />                
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_6)) {
                        ?>
                        <li id="pic_img6">
                            <img src="<?php echo $model->_img6_th; ?>"  />                
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_7)) {
                        ?>
                        <li id="pic_img7">        
                            <img src="<?php echo $model->_img7_th; ?>"  />                
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if (!empty($model->img_8)) {
                        ?>
                        <li id="pic_img8">        
                            <img src="<?php echo $model->_img8_th; ?>"  />                
                        </li>
                        <?php
                    }
                    ?>                        
                </ul>
            </div>
        </div>        
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div id="ad_bottom">
    <?php if (Yii::app()->customer->isCarrier && $model->checkIfValidAd()): ?>
        <div class="span4 bg-white left" <?php echo (Yii::app()->customer->isCarrier && $model->checkIfValidAd()) ? "" : "style='display:none'"; ?>>
            <h2 class="title-bar dark"><?php echo __('Ostavi ponudu'); ?></h2>
            <div id="sidebar">
                <?php $this->renderPartial('partials/_add_offer_form', array('model' => $model, 'offer_model' => $offer_model)); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="<?php echo (Yii::app()->customer->isCarrier && $model->checkIfValidAd()) ? 'span8-re small_size' : 'span12-re left'; ?> bg-white inner-content" id="ad_offers">    
        <h2 class="title-bar light"><?php echo __('Ponude'); ?></h2>
        <?php $this->renderPartial('partials/offers', array('model' => $model, "offers" => $offers, 'offer_model' => $offer_model)); ?>
    </div>
    <div class="clearfix"></div>
</div>
<?php $this->renderPartial("partials/_report_ad", array("report_model" => $report_model, "model" => $model)); ?>
<?php $this->renderPartial("partials/_send_to_friend_modal", array("send_model" => $send_model, "model" => $model)); ?>