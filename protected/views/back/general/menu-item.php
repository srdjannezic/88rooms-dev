<div class="s_panel ui-sortable-handle">
    <a href="#" onclick="removeMenuItem(this)" class="removeMenuItem">Remove</a>
    <h3>Menu item - <span class="menuItemTitle" id="menuItemTitle-<?php echo $i; ?>"><?php echo ($model->title) ? $model->title : (($model->cms_object_id) ? $model->cmsObject->title : ""); ?></span></h3>
    <div>

        <?php foreach (CHtml::listData(Language::model()->findAll(), "code", "name") as $l => $lang) : ?>            
            <?php
            if ($l === Yii::app()->params['defaultLanguage'])
                $suffix = '';
            else
                $suffix = '_' . $l;
            //Utility::dump($model->title_en);
            ?>
            <div class="control-group">
                <?php echo CHtml::label("Title " . $suffix, 'title' . $suffix); ?>
                <?php echo CHtml::textField('MenuItem[' . $i . '][title' . $suffix . ']', $model->{title . $suffix}, array("onKeyUp" => "changeMenuItemTitle(this.value," . $i . ")")); ?>
            </div>
        <?php endforeach; ?>
        <div class="control-group">
            <?php echo CHtml::label("Url", 'url'); ?>
            <?php echo CHtml::textField('MenuItem[' . $i . '][url]', $model->url); ?>
        </div>
        <div class="control-group">
            <?php echo CHtml::label("Cms Object", 'cms_object_id'); ?>
            <?php echo CHtml::dropDownList('MenuItem[' . $i . '][cms_object_id]', $model->cms_object_id, CHtml::listData(CmsObject::model()->findAll(), "id", "title")); ?>
        </div>
        <div class="control-group">
            <?php echo CHtml::label("Class", 'class'); ?>
            <?php echo CHtml::textField('MenuItem[' . $i . '][class]', $model->class); ?>
        </div>
        <div class="control-group">
            <?php echo CHtml::label("Target", 'target'); ?>
            <?php echo CHtml::textField('MenuItem[' . $i . '][target]', $model->target); ?>
        </div>
    </div>
</div>