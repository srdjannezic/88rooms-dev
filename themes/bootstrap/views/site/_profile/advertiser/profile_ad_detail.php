<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<div id="inner-content" class="well">
    <h2 class="title"><?php echo __("Oglas") . " - #" . $model->id; ?></h2>
    <hr/>

    <div class="row">
        <div class="span6-re">
            <h3><?php echo __('Detalji oglasa'); ?></h3>
            <?php
            $this->widget('bootstrap.widgets.TbDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'title',
                    'weight',
                    'dimensions',
                    'price',
                    'date_created',
                    'deadline',
                    'description',
                    array(
                        'name' => 'start_point',
                        'value' => $model->start->name,
                    ),
                    'start_municipality',
                    array(
                        'name' => 'end_point',
                        'value' => $model->end->name,
                    ),
                    'end_municipality',
                    array(
                        'name' => 'status',
                        'value' => $model->_status,
                        'type' => 'raw'
                    ),
                ),
            ));
            ?>
        </div>
        <div class="span6-re">
            <h3><?php echo __('Slike'); ?></h3>
            <?php
            if (!empty($model->img_1)) {
                ?>
                <li class="thumbnail span3-re" id="pic_img1">
                    <img src="<?php echo $model->_img1; ?>" width="350px" />        
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_2)) {
                ?>
                <li class="thumbnail span3-re" id="pic_img2">
                    <img src="<?php echo $model->_img2; ?>" width="350px" />        
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_3)) {
                ?>
                <li class="thumbnail span3-re" id="pic_img3">
                    <img src="<?php echo $model->_img3; ?>" width="350px" />        
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_4)) {
                ?>
                <li class="thumbnail span3-re" id="pic_img4">
                    <img src="<?php echo $model->_img4; ?>" width="350px" />        
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_5)) {
                ?>
                <li class="thumbnail span3-re" id="pic_img5">        
                    <img src="<?php echo $model->_img5; ?>" width="350px" />                
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_6)) {
                ?>
                <li class="thumbnail span3-re" id="pic_img6">
                    <img src="<?php echo $model->_img6; ?>" width="350px" />                
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_7)) {
                ?>
                <li class="thumbnail span3-re" id="pic_img7">        
                    <img src="<?php echo $model->_img7; ?>" width="350px" />                
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_8)) {
                ?>
                <li class="thumbnail span3-re" id="pic_img8">        
                    <img src="<?php echo $model->_img8; ?>" width="350px" />                
                </li>
                <?php
            }
            ?>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <?php $this->renderPartial("profile/advertiser/partials/_ad_offers", array("model_offer" => $model_offer,"offerDataProvider"=>$offerDataProvider)); ?>
    </div>
</div>
<script>
    function approveOffer(el){
        $.post($(el).attr('href'),{},function(data){
            $.fn.yiiGridView.update("offer-grid");            
        })
    }
</script>