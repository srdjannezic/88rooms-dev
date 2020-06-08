<h2 class="title-bar dark"><?php echo $model->start->name . '-' . $model->end->name; ?></h2>
<span class="back-link"><?php echo CHtml::link(__('&laquo; Nazad'), array('site/ad', "id" => $model->id)); ?></span>
<div id="inner-content">    
    <div class="span2-re left">            
        <?php echo CHtml::image($model->contact->_img, $model->contact->first_name . " " . $model->contact->last_name, array("class" => 'img-polaroid')); ?>
    </div>
    <div class="span10-re">
        <h2 class="title-small"><?php echo sprintf(__("Oglas postavio: %s"), $model->contact->first_name . " " . $model->contact->last_name); ?></h2>
        <span class="small"><?php echo $model->title; ?></span>
        <div class="span2-re left">
            <div class="single-info">
                <b><?php echo CHtml::encode($model->getAttributeLabel('weight')); ?>:</b>
                <?php echo CHtml::encode($model->weight); ?><br/>
                <b><?php echo CHtml::encode($model->getAttributeLabel('dimensions')); ?>:</b><br/>
                <?php echo CHtml::encode($model->dimensions); ?><br/>       
            </div>
        </div>
        <div class="span2-re">
            <div class="single-info">
                <b><?php echo CHtml::encode($model->getAttributeLabel('date_created')); ?>:</b><br>
                <?php echo CHtml::encode($model->date_created); ?>                      
            </div>
        </div>
        <div class="span2-re">
            <div class="single-info">
                <b><?php echo CHtml::encode($model->getAttributeLabel('deadline')); ?>:</b><br />
                <?php echo CHtml::encode($model->deadline); ?><br />    
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div class="span4 bg-white left">
    <h2 class="title-bar dark"><?php echo __('Ostavi poruku'); ?></h2>
    <div id="sidebar">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'message-form',
            'enableAjaxValidation' => false,
                ));
        ?>
        <?php echo $form->errorSummary($message_model); ?>
        <?php if (Yii::app()->customer->hasFlash('success')) { ?>
            <div class="alert in alert-block fade alert-success">
                <?php echo Yii::app()->customer->getFlash('success'); ?>
            </div>
        <?php } ?>
        <?php echo $form->textAreaRow($message_model, 'message', array('class' => 'input-large', 'maxlength' => 255)); ?>
        <button class="btn-blue btn" type="submit"><?php echo __('Ostavi poruku'); ?></button>
        <?php $this->endWidget(); ?>
    </div>
</div>
<div class="span8-re bg-white inner-content" id="message_board">
    <h2 class="title-bar light"><?php echo __("Tabla sa porukama"); ?></h2>
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $messages,
        'itemView' => 'partials/_view_messages',
        'sortableAttributes' => array(),
        'summaryText' => '',
        'ajaxUpdate' => true,
        'id' => 'ad-messages-list',
        'pager' => array(
            'class' => 'bootstrap.widgets.TbPager',
            'header' => '',
            'firstPageLabel' => __('Prva'),
            'prevPageLabel' => __('Prethodna'),
            'nextPageLabel' => __('Sledeća'),
            'lastPageLabel' => __('Poslednja'),
        ),
    ));
    ?>
</div>
<div class="clearfix"></div>