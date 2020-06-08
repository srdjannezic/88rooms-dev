<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cms-object-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block"><?php echo sprintf(__('Fields with %s are required.'), '<span class=\'required\'>*</span>'); ?></p>

<?php echo $form->errorSummary($model); ?>

<div>
    <div class="span9">        
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
        //Utility::dump($tabs);
        $this->widget("TabView", array(
            'htmlOptions' => array(
                "class" => "bootstrap-tab-view"
            ),
            'tabs' => $tabs
        ));
        ?>
        <?php echo $form->hiddenField($model, 'object_type'); ?>        
    </div>
    <div class="span3">
        <?php echo $form->textFieldRow($model, 'slug', array('class' => 'span12', 'maxlength' => 200)); ?>
        <?php echo $form->labelEx($model, 'date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'date_created',
            'options' => array(
                'dateFormat' => 'dd-mm-yy', // save to db format                
                'altFormat' => 'dd-mm-yy', // show to user format
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));
        ?>
        <?php echo $form->dropDownListRow($model, 'visible', array("1" => "Yes", "0" => "No"), array('class' => 'span12', 'maxlength' => 200)); ?>
        <?php if ($model->object_type == CmsObjectTypes::CMS_PAGE): ?>
            <?php $data = ($model->isNewRecord) ? CHtml::listData(CmsObject::model()->findAll("object_type=:ot", array(":ot" => $model->object_type)), "id", "title") : CHtml::listData(CmsObject::model()->findAll("t.id!=:id AND object_type=:ot", array(":id" => $model->id, ":ot" => $model->object_type)), "id", "title"); ?>

            <?php echo $form->dropDownListRow($model, 'parent_id', $data, array('class' => 'span12', 'maxlength' => 200, 'prompt' => "Select a parent page")); ?>
            <?php echo $form->dropDownListRow($model, 'cms_object_template_id', CHtml::listData(CmsObjectTemplate::model()->findAll(), "id", "name"), array('class' => 'span12', 'maxlength' => 200, 'prompt' => "Select a page template")); ?>
        <?php else: ?>

            <?php echo $form->labelEx($model, '_categories'); ?>
            <?php
            echo Chosen::activeMultiSelect($model, '_categories', CHtml::listData(CmsCategory::model()->findAll(), "id", "name"), array("class" => "span12")
            );
            ?>
        <?php endif; ?>
        <?php echo $form->labelEx($model, '_blocks'); ?>
        <?php
        echo Chosen::activeMultiSelect($model, '_blocks', CHtml::listData(CmsBlock::model()->findAll(), "id", "name"), array("class" => "span12")
        );
        ?>

        <div id="cmd_media_thumb">
            <input type="hidden" name="CmsObject[cms_media_id]" value="<?php echo $model->cms_media_id; ?>"/>
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
                    "onclick" => "openMediaModal()"
                )
            ));
            ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>

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
<?php
echo $this->renderPartial("/general/media-modal", array("media_id" => $model->cms_media_id));
?>