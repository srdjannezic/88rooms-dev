<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'menu-item-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block"><?php echo sprintf(__('Fields with %s are required.'), '<span class=\'required\'>*</span>'); ?></p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'url', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->dropDownListRow($model, 'cms_object_id', CHtml::listData(CmsObject::model()->findAll(), "id", "title"), array('class' => 'span5', 'prompt' => '')); ?>
<?php echo $form->textFieldRow($model, 'class', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'target', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'ordr', array('class' => 'span5')); ?>
<?php echo $form->dropDownListRow($model, 'menu_id', CHtml::listData(Menu::model()->findAll(), "id", "name"), array('class' => 'span5', 'prompt' => '')); ?>

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
