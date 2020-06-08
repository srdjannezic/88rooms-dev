<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cms-category-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block"><?php echo sprintf(__('Fields with %s are required.'), '<span class=\'required\'>*</span>'); ?></p>

<?php echo $form->errorSummary($model); ?>
<?php $categories = ($model->id) ? CHtml::listData(CmsCategory::model()->findAll("t.id!=:ID", array(":ID" => $model->id)), "id", "name") : CHtml::listData(CmsCategory::model()->findAll(), "id", "name"); ?>
<?php foreach (CHtml::listData(Language::model()->findAll(), "code", "name") as $l => $lang) : ?>            
    <?php
    if ($l === Yii::app()->params['defaultLanguage'])
        $suffix = '';
    else
        $suffix = '_' . $l;
    ?>
    <?php echo $form->textFieldRow($model, 'name' . $suffix, array('class' => 'span5', 'maxlength' => 255)); ?>
<?php endforeach; ?>
<?php echo $form->textFieldRow($model, 'slug', array('class' => 'span5', 'maxlength' => 200)); ?>
<?php echo $form->dropDownListRow($model, 'category_parent_id', $categories, array("class" => "span5", "prompt" => "Select a category")); ?>

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
