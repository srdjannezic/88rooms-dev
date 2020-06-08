<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'video-form',
    'enableAjaxValidation' => true,
    'action' => Utility::createUrl("ajax/videoCreate"),
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
        'validateOnType' => false,
        'afterValidate' => "js:function(form, data, hasError){
            //RECEIVE FORM VALIDATION MESSAGES
            if (hasError) {                
                //DO SOMETHING IF NECESSARY
                return false;
            }else {
                $('#video-form')[0].reset();
                $.fn.yiiListView.update('media-modal-list');
            }
        }"
    )
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'video_url', array('class' => 'span10')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Add'
    ));
    ?>
</div>

<?php $this->endWidget(); ?>