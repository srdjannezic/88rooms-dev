<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'contact-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'action' => Utility::createUrl("ajax/contact"),
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:function(form, data, hasError){            
            _gaq.push(["_trackEvent", "contact", "clicked", "contact form button clicked"]);
            if(!hasError){
                _gaq.push(["_trackEvent", "contact", "sent", "contact form submitted and sent"]);
            }            
        }'
        )));
?>
<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<div class="control-group">
    <?php echo $form->textField($model, 'name', array('placeholder' => Translation::model()->getByKey('your_name'))) ?>
    <?php echo $form->error($model, 'name'); ?>
</div>
<div class="control-group nights">
    <?php echo $form->textField($model, 'email', array('placeholder' => Translation::model()->getByKey('your_email'))) ?>
    <?php echo $form->error($model, 'email'); ?>
</div>
<div class="control-group adults">
    <?php echo $form->textArea($model, 'body', array('placeholder' => Translation::model()->getByKey('your_message'))) ?>
    <?php echo $form->error($model, 'body'); ?>
</div>
<div class="control-group last">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => Translation::model()->getByKey('send'),
        'htmlOptions' => array(
            'class' => 'btn'
        )
    ));
    ?>
    <span class="aditional-text"><?php echo '* ' . Translation::model()->getByKey('all_fields_are_mandatory'); ?></span>
</div>
<?php $this->endWidget(); ?>