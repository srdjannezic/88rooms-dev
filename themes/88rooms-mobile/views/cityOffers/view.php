<div class="title">
    <h1><?php echo $this->config->cityOffersArchive->title; ?></h1>
</div>
<article class="single-view single-post">    
    <div class="container_12 cf">
        <div class="grid_12 first last top-title">
            <h2><?php echo $model->title; ?></h2>
        </div>
        <div class="grid_12 first last thumb">            
            <img src="<?php echo $model->cmsMedia->_image_url; ?>" />
        </div>
        <div class="grid_12 first last">            
            <p><?php echo $model->text; ?></p>            
            <div class="divider grid_12"></div>
        </div>
        <div class="clearfix"></div>        
    </div>
</article>
<?php if ($this->config->city_offers_archive): ?>
    <div class="container_12">
        <div class="archive-back">
            <a class="prev" href="<?php echo Utility::createUrl("page/index", array("slug" => $this->config->cityOffersArchive->slug)); ?>" title="<?php echo sprintf(__("All %s"), $this->config->cityOffersArchive->title); ?>">
                <?php echo Translation::model()->getByKey('all') . " " . Translation::model()->getByKey('belgrade_offers'); ?>
            </a>
        </div>
    </div>
<?php endif; ?>