<article class="single-view special-offer-single">
    <div class="bg-left-black">        
    </div>
    <div class="container_12 pos-rel">
        <span class="overlay-top"></span>
        <div class="grid_4 first thumb">            
            <img src="<?php echo $data->cmsMedia->_thumb_url; ?>" />            
            <span class="overlay"></span>
        </div>
        <div class="grid_8 last">
            <span class="rect-bg"></span>
            <h2><?php echo CHtml::link(CHtml::encode($data->title), array('specialOffers/view', 'slug' => $data->slug),array('title'=> CHtml::encode($data->title))); ?></h2>
            <div class="offer-info">
                <div class="single-info modified first"><?php echo Translation::model()->getByKey('minimum_stay') . "<b>" . $data->minimum_stay . "</b>"; ?></div>
                <div class="single-info modified first"><?php echo Translation::model()->getByKey('minimum_persons') . "<b>" . $data->minimum_persons . "</b>"; ?></div>
                <div class="single-info modified first"><?php echo Translation::model()->getByKey('price_from') . "<b>" . $data->price_from . " " . param("currency") . "</b>"; ?></div>
                <div class="clearfix"></div>
            </div>
            <p class="active-from"><?php echo Translation::model()->getByKey('active_for_the_period') . date('d F', strtotime($data->active_from)) . '-' . date('d F', strtotime($data->active_to)); ?></p>
            <p><?php echo $data->_excerpt; ?></p>
            <div class="buttons">
                <a href="<?php echo Utility::createUrl("site/bookNow", array("id" => $data->offer_id)); ?>" class="btn btn-black book-now-offer">
                    <?php echo Translation::model()->getByKey('book_now'); ?>
                </a>
                <a title="<?php echo $data->title;?>" href="<?php echo Utility::createUrl("specialOffers/view", array("slug" => $data->slug)); ?>" class="btn btn-white book-now-offer">
                    <?php echo Translation::model()->getByKey('more_info'); ?>
                </a>
            </div>            
        </div>
        <div class="divider-new prefix_8 grid_4"></div>
        <div class="clearfix"></div>        
    </div>
</article>