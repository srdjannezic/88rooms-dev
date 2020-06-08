<div class="title">
    <h1><?php echo $this->config->specialOffersArchive->title; ?></h1>
</div>
<article class="single-view special-offer-single single-post">    
    <div class="container_12 cf">
        <div class="grid_12 first last top-title">
            <h2><?php echo $model->title; ?></h2>            
        </div>
        <div class="grid_12 first last thumb">
            <span class="bg-rect"></span>
            <img src="<?php echo $model->cmsMedia->_thumb_url; ?>" />            
        </div>
        <div class="grid_12 first last">
            <div class="offer-info cf">
                <div class="single-info modified first"><?php echo Translation::model()->getByKey('minimum_stay') . "<b>" . $model->minimum_stay . "</b>"; ?></div>
                <div class="single-info modified first"><?php echo Translation::model()->getByKey('minimum_persons') . "<b>" . $model->minimum_persons . "</b>"; ?></div>
                <div class="single-info modified first"><?php echo Translation::model()->getByKey('price_from') . "<b>" . $model->price_from . " " . param("currency") . "</b>"; ?></div>
            </div>
             <p class="active-from"><?php echo Translation::model()->getByKey('active_for_the_period') . date('d F', strtotime($model->active_from)) . '-' . date('d F', strtotime($model->active_to)); ?></p>
            <p><?php echo $model->text; ?></p>
            <div class="buttons cf">
               <a href="<?php echo Utility::createUrl("site/bookNow", array("id" => $model->offer_id, "nights" => $model->minimum_stay)); ?>" class="btn btn-black grid_6 first">
                    <?php echo Translation::model()->getByKey('book_now'); ?>
                </a>        
            </div>
            <div class="divider grid_12"></div>
        </div>
        <div class="clearfix"></div>        
    </div>
</article>
<?php if ($this->config->special_offers_archive): ?>
    <div class="container_12">
        <div class="archive-back">
            <a class="prev" href="<?php echo Utility::createUrl("page/index", array("slug" => $this->config->specialOffersArchive->slug)); ?>" title="<?php echo sprintf(__("All %s"), $this->config->specialOffersArchive->title); ?>">
                <?php echo Translation::model()->getByKey('all')." ".$this->config->specialOffersArchive->title; ?>
            </a>
        </div>
    </div>
<?php endif; ?>