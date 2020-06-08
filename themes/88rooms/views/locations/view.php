<div class="title">
    <h1><?php echo __('News'); ?></h1>
</div>
<article class="single-view">
    <div class="container_12">
        <div class="grid_4 first">
            <img src="<?php echo $model->cmsMedia->_thumb_url; ?>" />
        </div>
        <div class="grid_8 last">
            <h2><?php echo $model->title; ?></h2>
            <time><?php echo $model->date_created; ?></time>
            <p><?php echo $model->text; ?></p>            
        </div>
        <div class="clearfix"></div>
    </div>
</article>