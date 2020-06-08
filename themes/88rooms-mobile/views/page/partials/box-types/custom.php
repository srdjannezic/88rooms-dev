<div class = "thumb">
    <img src = "<?php echo $model->cmsMedia->_thumb_url; ?>" alt = "<?php echo $model->title; ?>"/>
</div>
<div class = "box-content">
    <h2><?php echo $model->title;
?></h2>
    <?php echo $model->text; ?>
    <?php if ($model->btn_text): ?>
        <a href="<?php echo $model->url; ?>" class="btn btn-read-more" title="<?php echo $model->title; ?>"><?php echo $model->btn_text; ?></a>
    <?php endif; ?>
</div> 