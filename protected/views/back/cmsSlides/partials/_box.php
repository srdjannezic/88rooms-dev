<div class="s_panel ui-sortable-handle">
    <a href="#" onclick="removeItem(this)" class="removeMenuItem">Remove</a>
    <h3>Box item - <span class="itemTitle" id="itemTitle-<?php echo $i; ?>"><?php echo $model->title; ?></span></h3>
    <div>
        <div class="control-group">
            <?php echo CHtml::label("Title", 'title'); ?>
            <?php echo CHtml::textField('SlideBox[' . $i . '][title]', $model->title, array("onKeyUp" => "changeItemTitle(this.value," . $i . ")")); ?>
        </div>
        <div class="control-group">
            <?php echo CHtml::label("Url", 'url'); ?>
            <?php echo CHtml::textField('SlideBox[' . $i . '][url]', $model->url); ?>
        </div>
        <div class="control-group">
            <?php echo CHtml::label("Text", 'cms_object_id'); ?>
            <?php echo CHtml::textArea('SlideBox[' . $i . '][text]', $model->text); ?>
        </div>
        <div class="control-group">
            <?php echo CHtml::label("Button text", 'class'); ?>
            <?php echo CHtml::textField('SlideBox[' . $i . '][btn_text]', $model->btn_text); ?>
        </div>
    </div>
</div>