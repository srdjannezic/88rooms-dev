<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cms-box-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block"><?php echo sprintf(__('Fields with %s are required.'), '<span class=\'required\'>*</span>'); ?></p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->dropDownListRow($model, 'type', CmsBoxTypes::types(), array('class' => 'span5')); ?>
<?php /*<div id="page" style="<?php echo ($model->type != CmsBoxTypes::CMS_PAGE) ? "display: none" : ""; ?>" class="block-type page-field-wrap">
    <?php echo $form->dropDownListRow($model, 'cms_object_id', CHtml::listData(CmsObject::model()->pages()->findAll(), "id", "title"), array('class' => 'span5 page-field', 'prompt' => 'Select a page')); ?>
</div>*/?>
<?php echo $form->dropDownListRow($model, 'cms_object_id', CHtml::listData(CmsObject::model()->pages()->findAll(), "id", "title"), array('class' => 'span5 page-field', 'prompt' => 'Select a page')); ?>
<div id="custom" class="block-type common-field-wrap">
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
            "data" => array("form" => $form, "model" => $model, "suffix" => $suffix)
        );
        ?>        
    <?php endforeach; ?>
    <?php
    $this->widget("TabView", array(
        'htmlOptions' => array(
            "class" => "bootstrap-tab-view"
        ),
        'tabs' => $tabs
    ));
    ?>  
    <?php echo $form->textFieldRow($model, 'url', array('class' => 'span5', 'maxlength' => 300)); ?>    
    <div id="cmd_media_thumb">
        <input type="hidden" name="CmsBox[cms_media_id]" value="<?php echo $model->cms_media_id; ?>"/>
        <?php echo (!empty($model->cms_media_id)) ? '<img src="' . $model->cmsMedia->_thumb_url . '" />' : '<img src="" />'; ?>
    </div>
    <br/>
    <div id="feature-image">            
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'label' => 'Add a feature image',
            'block' => true,
            'htmlOptions' => array(
                "id" => "featureimage-add",
                "onclick" => "openMediaModal()",
                "class" => "span5"
            )
        ));
        ?>
    </div>
</div>
<div class="clearfix"></div>
<?php echo $form->dropDownListRow($model, 'visible', array("1" => "Yes", "0" => "No"), array('class' => 'span5', 'maxlength' => 200)); ?>
<?php echo $form->labelEx($model, '_blocks'); ?>
<?php
echo Chosen::activeMultiSelect($model, '_blocks', CHtml::listData(CmsBlock::model()->findAll(), "id", "name"), array("class" => "span12")
);
?>



<?php echo $form->textFieldRow($model, 'ordr', array('class' => 'span5')); ?>

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
<script>
    $(function(){
        $("select[name='CmsBox[type]']").change(function(){
            $(".block-type").not('.common-field-wrap').hide();
            $("." + $(this).val() + '-field-wrap').show();
        });
    })
</script>
<?php
echo $this->renderPartial("/general/media-modal", array("media_id" => $model->cms_media_id));
?>