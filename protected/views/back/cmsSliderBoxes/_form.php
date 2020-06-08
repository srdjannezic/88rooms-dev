<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cms-slider-boxes-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
    ),
        ));
?>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->dropDownListRow($model, 'type', CmsBoxTypes::types(), array('class' => 'span5', 'prompt' => 'Select a type')); ?>
<div id="page" class="block-type" style="<?php echo ($model->type == 'page') ? '' : 'display: none;'; ?>">
    <?php echo $form->dropDownListRow($model, 'cms_object_id', CHtml::listData(CmsObject::model()->pages()->findAll(), "id", "title"), array('class' => 'span5', 'prompt' => 'Select a page')); ?>
</div>
<div id="custom" style="<?php echo ($model->type == 'custom') ? '' : 'display: none;'; ?>" class="block-type">
    <?php foreach (CHtml::listData(Language::model()->findAll(), "code", "name") as $l => $lang) : ?>            
        <?php
        if ($l === Yii::app()->params['defaultLanguage'])
            $suffix = '';
        else
            $suffix = '_' . $l;
        ?>
        <?php
        $tabs[$l] = array(
            "title" => $lang,
            "view" => "partials/_form_lang",
            "data" => array("form" => $form, "box" => $model, "suffix" => $suffix)
        );
        ?>        
    <?php endforeach; ?>
    <?php echo $form->textFieldRow($model, 'url', array('class' => 'span5', 'maxlength' => 300)); ?>
    <?php
    $this->widget("TabView", array(
        'htmlOptions' => array(
            "class" => "bootstrap-tab-view"
        ),
        'tabs' => $tabs
    ));
    ?>    
</div>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Save',
    ));
    ?>
</div>
<?php $this->endWidget(); ?>
<script>
    $(function(){
        $("select[name='CmsSliderBox[type]']").change(function(){
            $(".block-type").hide();
            $("#"+$(this).val()).show();
        });
    });
</script>