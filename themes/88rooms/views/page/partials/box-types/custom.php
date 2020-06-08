<div class = "thumb">
    <img src="<?php echo Yii::app()->iwi->load($model->cmsMedia->_image_path)->adaptive(336, 220)->cache(); ?>" alt="<?php echo $model->title; ?>"/>                
</div>
<div class = "box-content">
    <h2><?php echo $model->title; ?></h2>
    <p><?php echo $model->text; ?></p>
    <?php if ($model->btn_text): ?>
        <a href="<?php echo ($model->cms_object_id) ? Utility::createUrl("page/index", array("slug" => $model->cmsObject->slug)) : $model->url; ?>" class="btn btn-read-more" title="<?php echo $model->title; ?>"><?php echo $model->btn_text; ?></a>
    <?php endif; ?>
</div> 