<div class = "thumb">
    <img src = "<?php echo $model->cmsObject->cmsMedia->_thumb_url; ?>" alt = "<?php echo $model->cmsObject->title; ?>"/>
</div>
<div class = "box-content">
    <h2><?php echo $model->title;
?></h2>
    <p><?php echo $model->text; ?></p>
    <?php if ($model->btn_text): ?>
        <a href="<?php echo Utility::createUrl("page/index", array("slug" => $model->cmsObject->slug)); ?>" class="btn btn-read-more" title="<?php echo $model->cmsObject->title; ?>"><?php echo $model->btn_text; ?></a>
    <?php endif; ?>
</div>