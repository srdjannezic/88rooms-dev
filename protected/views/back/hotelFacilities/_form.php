<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'hotel-facility-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block"><?php echo sprintf(__('Fields with %s are required.'), '<span class=\'required\'>*</span>'); ?></p>

<?php echo $form->errorSummary($model); ?>

<?php foreach (CHtml::listData(Language::model()->findAll(), "code", "name") as $l => $lang) : ?>            
    <?php
    if ($l === Yii::app()->params['defaultLanguage'])
        $suffix = '';
    else
        $suffix = '_' . $l;
    ?>
    <?php echo $form->textFieldRow($model, 'name' . $suffix, array('class' => 'span5', 'maxlength' => 255)); ?>
<?php endforeach; ?>

<?php echo $form->dropDownListRow($model, 'hotel_facilities_category_id', CHtml::listData(HotelFacilitiesCategory::model()->findAll(), "id", "name"), array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'ordr', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create room amenity' : 'Save room amenity',
    )); 
    ?>
</div>

<?php $this->endWidget(); ?> 
