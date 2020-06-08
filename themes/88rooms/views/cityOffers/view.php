<div class="title">
    <h1><?php echo $this->config->cityOffersArchive->title; ?></h1>
</div>
<article class="single-view single-post">
    <div class="bg-left-black">        
    </div>
    <div class="container_12 pos-rel">
        <span class="overlay-top"></span>
        <div class="grid_4 first thumb">            
            <img src="<?php echo $model->cmsMedia->_thumb_url; ?>" />            
            <span class="overlay"></span>
        </div>
        <div class="grid_8 last">
            <span class="rect-bg"></span>
            <h2><?php echo $model->title; ?></h2>            
            <p><?php echo $model->text; ?></p>
            <div class="divider grid_4"></div>
        </div>
        <div class="clearfix"></div>        
    </div>
</article>

<?php if ($this->config->city_offers_archive): ?>
    <div class="container_12">
        <div class="archive-back prefix_4">
            <a class="prev" href="<?php echo Utility::createUrl("page/index", array("slug" => $this->config->cityOffersArchive->slug)); ?>" title="<?php echo sprintf(__("All %s"), $this->config->cityOffersArchive->title); ?>">
                <?php echo Translation::model()->getByKey('back_to_all_offers'); ?>
            </a>
        </div>
    </div>
<?php endif; ?>