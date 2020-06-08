<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'translation-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block"><?php echo sprintf(__('Fields with %s are required.'), '<span class=\'required\'>*</span>'); ?></p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'key', array('class' => 'span5', 'maxlength' => 300)); ?>
<?php foreach (CHtml::listData(Language::model()->findAll(), "code", "name") as $l => $lang) : ?>            
    <?php
    if ($l === Yii::app()->params['defaultLanguage'])
        $suffix = '';
    else
        $suffix = '_' . $l;
    ?>
    <?php echo $form->textFieldRow($model, 'word' . $suffix, array('class' => 'span5', 'maxlength' => 300)); ?>
<?php endforeach; ?>


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
