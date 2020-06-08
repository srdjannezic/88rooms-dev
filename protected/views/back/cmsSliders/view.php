<?php
$this->breadcrumbs = array(
    'Cms Sliders' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List CmsSlider', 'url' => array('index')),
    array('label' => 'Create CmsSlider', 'url' => array('create')),
    array('label' => 'Update CmsSlider', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete CmsSlider', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage CmsSlider', 'url' => array('admin')),
);
?>

<h1>#<?php echo $model->id; ?> Slider (<?php echo $model->name; ?>)</h1>

<h2>Boxes</h2>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cms-slider-boxes-form',
    'enableAjaxValidation' => false,
    'action' => Yii::app()->createUrl('//cmsSliders/updateSlides', array("id" => $model->id)),
    'htmlOptions' => array(
        'onsubmit' => "return false;", /* Disable normal form submit */
    //'onkeypress' => " if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
    ),
        ));
?>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->dropDownListRow($box, 'type', CmsBoxTypes::types(), array('class' => 'span5', 'prompt' => 'Select a type')); ?>
<div id="page" class="block-type" style="display: none;">
    <?php echo $form->dropDownListRow($box, 'cms_object_id', CHtml::listData(CmsObject::model()->pages()->findAll(), "id", "title"), array('class' => 'span5', 'prompt' => 'Select a page')); ?>
</div>
<div id="custom" style="display: none;" class="block-type">
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
            "data" => array("form" => $form, "box" => $box, "suffix" => $suffix)
        );
        ?>        
    <?php endforeach; ?>
    <?php echo $form->textFieldRow($box, 'url', array('class' => 'span5', 'maxlength' => 300)); ?>
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
<div class="boxes">
    <?php
    $this->widget('ext.yiisortablemodel.widgets.SortableCGridView', array(
        'type' => 'striped condensed',
        'orderField' => 'ordr',
        'relation_field' => 'cms_slider_id',
        'relation_field_value' => $model->id,
        'orderUrl' => 'cmsSliderBoxes/order',
        'id' => 'boxes-list',
        'dataProvider' => $boxes,
        'columns' => array(
            'id',
            array(
                'name' => 'cms_object_id',
                'value' => '$data->cmsObject->title'
            ),
            array(
                'name' => 'title',
                'value' => '$data->title'
            ),
            array(
                'name' => 'text',
                'value' => '$data->text'
            ),
            array(
                'name' => 'btn_text',
                'value' => '$data->btn_text'
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{update} {delete}',
                'buttons' => array(
                    'delete' => array(
                        'url' => 'CController::createUrl("/cmsSliders/removeBox", array("id"=>$data->id))'
                    ),
                    'update' => array(
                        'url' => 'CController::createUrl("/cmsSliderBoxes/update", array("id"=>$data->id))'
                    )
                )
            ),
        ),
    ));
    ?>
</div>

<h2>Slides</h2>
<?php /* <div id="cms_media_slides" class="sortable">
  <?php
  $i = 0;
  foreach ($model->cmsSlides as $slide):
  ?>
  <?php
  echo $this->renderPartial('partials/_slides', array(
  "model" => $slide,
  "i" => $i
  ));
  $i++;
  ?>
  <?php endforeach; ?>
  </div>
  <button class="add-slide btn btn-danger" type="button" onclick="openMediaModal(1)">Add slide</button> */ ?>
<?php
$this->widget('MediaModal', array(
    "type" => "grid",
    "updateCont" => "galleryItems",
    "url" => Utility::createUrl("ajax/addSliderItem", array("id" => $model->id))
        )
);
?>
<div class="content-reload" data-reloadUrl="<?php echo Utility::createUrl("cmsGalleries/view", array("id" => $model->id)); ?>">
    <?php
    $this->widget('ext.yiisortablemodel.widgets.SortableCGridView', array(
        'type' => 'striped condensed',
        'dataProvider' => $slides,
        'orderField' => 'ordr',
        'orderUrl' => 'cmsSlides/order',
        'id' => 'galleryItems',
        'columns' => array(
            'id',
            array(
                'name' => 'cms_media_id',
                'value' => '"<img width=\'50px\' src=\'".((substr($data->cmsMedia->media_type, 0, 5) == "video") ? $data->cmsMedia->file : $data->cmsMedia->_thumb_url)."\' />"',
                'type' => 'raw'
            ),
            array(
                'name' => 'title',
                'value' => '$data->cmsMedia->title'
            ),
            array(
                'name' => 'media_type',
                'value' => '$data->cmsMedia->media_type'
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{delete}',
                'buttons' => array(
                    'delete' => array(
                        'url' => 'CController::createUrl("/cmsSliders/removeSlide", array("id"=>$data->id))'
                    ),
                )
            ),
        ),
    ));
    ?>
</div>
<div class="clearfix"></div>

<script>
    $(function(){
        $("select[name='CmsSliderBox[type]']").change(function(){
            $(".block-type").hide();
            $("#"+$(this).val()).show();
        });
        $("#cms-slider-boxes-form").submit(function(){
 
            var data=$("#cms-slider-boxes-form").serialize();
 
 
            $.ajax({
                type: 'POST',
                url: '<?php echo Utility::createUrl("cmsSliders/addBox", array("id" => $model->id)); ?>',
                data:data,
                success:function(data){
                    if(!data.error){
                        $('#cms-slider-boxes-form')[0].reset();
                        $.fn.yiiGridView.update('boxes-list');
                    }
                },
                error: function(data) { // if error occured
                    alert("Error occured.please try again");
                    alert(data);
                },
 
                dataType:'json'
            });
 
        });
    });
    
 
</script>