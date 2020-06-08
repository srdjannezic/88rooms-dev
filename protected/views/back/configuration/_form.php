<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'configuration-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block"><?php echo sprintf(__('Fields with %s are required.'), '<span class=\'required\'>*</span>'); ?></p>

<?php echo $form->errorSummary($model); ?>


<?php echo $form->textFieldRow($model, 'email', array('class' => 'span7', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'phone', array('class' => 'span7', 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'address', array('class' => 'span7', 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'lat', array('class' => 'span7', 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'lng', array('class' => 'span7', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'downtown_lat', array('class' => 'span7', 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'downtown_lng', array('class' => 'span7', 'maxlength' => 100)); ?>
<?php echo $form->dropDownListRow($model, 'cms_slider_id', CHtml::listData(CmsSlider::model()->findAll(), "id", "name"), array('class' => 'span7', 'prompt' => '')); ?>
<?php echo $form->dropDownListRow($model, 'cms_mobile_slider_id', CHtml::listData(CmsSlider::model()->findAll(), "id", "name"), array('class' => 'span7', 'prompt' => '')); ?>
<?php echo $form->dropDownListRow($model, 'home_page', CHtml::listData(CmsObject::model()->findAll("object_type=:ot", array(":ot" => CmsObjectTypes::CMS_PAGE)), "id", "title"), array('class' => 'span7', 'prompt' => '')); ?>
<?php
echo $form->dropDownListRow($model, 'special_offers_archive', CHtml::listData(CmsObject::model()->findAll("object_type=:ot", array(":ot" => CmsObjectTypes::CMS_PAGE
                )), "id", "title"), array('class' => 'span7', 'prompt' => ''));
?>
<?php echo $form->dropDownListRow($model, 'city_offers_archive', CHtml::listData(CmsObject::model()->findAll("object_type=:ot", array(":ot" => CmsObjectTypes::CMS_PAGE)), "id", "title"), array('class' => 'span7', 'prompt' => '')); ?>
<?php echo $form->dropDownListRow($model, 'news_archive', CHtml::listData(CmsObject::model()->findAll("object_type=:ot", array(":ot" => CmsObjectTypes::CMS_PAGE)), "id", "title"), array('class' => 'span7', 'prompt' => '')); ?>
    <?php echo $form->dropDownListRow($model, 'rooms_archive', CHtml::listData(CmsObject::model()->findAll("object_type=:ot", array(":ot" => CmsObjectTypes::CMS_PAGE)), "id", "title"), array('class' => 'span7', 'prompt' => '')); ?>
<?php echo $form->textFieldRow($model, 'facebook', array('class' => 'span7', 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'twitter', array('class' => 'span7', 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'instagram', array('class' => 'span7', 'maxlength' => 100)); ?>
<?php echo $form->textFieldRow($model, 'linkedin', array('class' => 'span7', 'maxlength' => 100)); ?>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>

</div>
<div class="clearfix"></div>

<?php $this->endWidget(); ?>
