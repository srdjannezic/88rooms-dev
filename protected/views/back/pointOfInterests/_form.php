<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'point-of-interest-form',
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
    </div>
    <div class="span3">
        <?php echo $form->textFieldRow($model, 'slug', array('class' => 'span12', 'maxlength' => 200)); ?>
        <?php echo $form->dropDownListRow($model, 'visible', array("1" => "Yes", "0" => "No"), array('class' => 'span12', 'maxlength' => 200)); ?>
        <?php echo $form->textFieldRow($model, 'lat', array('class' => 'span5', 'maxlength' => 150)); ?>
        <?php echo $form->textFieldRow($model, 'lng', array('class' => 'span5', 'maxlength' => 150)); ?>
        <?php
        $this->widget('ext.coordinatepicker.CoordinatePicker', array(
            'model' => $model,
            'latitudeAttribute' => 'lat',
            'longitudeAttribute' => 'lng',
            //optional settings
            'editZoom' => 16,
            'pickZoom' => 12,
        ));
        ?>
        <?php echo $form->textFieldRow($model, 'distance', array('class' => 'span5', 'maxlength' => 150)); ?>
        <?php echo $form->dropDownListRow($model, 'color', array("blue" => 'Blue', 'light_blue' => 'Light Blue', "green" => "Green", "orange" => 'Orange', "black" => 'Black', "yellow" => 'Yellow', "purple" => "Purple", "pink" => "Pink"), array('class' => 'span12')); ?>        
        <div id="cmd_media_thumb">
            <input type="hidden" name="PointOfInterest[cms_media_id]" value="<?php echo $model->cms_media_id; ?>"/>
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