<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'food-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block"><?php echo sprintf(__('Polja sa %s su obavezna.'), '<span class=\'required\'>*</span>'); ?></p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 300)); ?>

<?php echo $form->textFieldRow($model, 'carbonHydrate', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'fat', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'proteins', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'callories', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'foodCategoryId', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',        
        'label' => $model->isNewRecord ? 'Create' : 'Save',
        'htmlOptions' => array(
            'class' => 'blue'
        ),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
