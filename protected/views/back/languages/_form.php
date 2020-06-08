<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'language-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block"><?php echo sprintf(__('Fields with %s are required.'), '<span class=\'required\'>*</span>'); ?></p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 30)); ?>
<?php echo $form->textFieldRow($model, 'code', array('class' => 'span5', 'maxlength' => 20)); ?>
<?php echo $form->textFieldRow($model, 'short', array('class' => 'span5', 'maxlength' => 3)); ?>
<?php echo $form->dropDownListRow($model, 'visible', array(1 => "Yes", 0 => "No"), array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
