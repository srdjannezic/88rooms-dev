<article class="single-view special-offer-single">
    <div class="bg-left-black">
        <span class="rect-bg"></span>
    </div>
    <div class="container_12 pos-rel">
        <span class="overlay-top"></span>
        <div class="grid_4 first thumb">            
            <img src="<?php echo $data->cmsMedia->_thumb_url; ?>" />            
            <span class="overlay"></span>
        </div>
        <div class="grid_8 last">
            <h2><?php echo CHtml::link(CHtml::encode($data->title), array('single', 'slug' => $data->slug)); ?></h2>
            <div class="offer-info">
                <div class="grid_2 first"><?php echo sprintf("Minimum stay: %s", $data->minimum_stay); ?></div>
                <div class="grid_2"><?php echo sprintf("Price from: %s", $data->price_from . " " . param("currency")); ?></div>
                <div class="clearfix"></div>
            </div>
            <p class="active-from"><?php echo sprintf("Active for the period: %s", $data->active_for); ?></p>
            <p><?php echo $data->text; ?></p>
            <div class="buttons">
                <a href="<?php echo Utility::createUrl("site/bookNow", array("id" => $data->hotel_room_id)); ?>" class="book-now btn">
                    <?php echo __('Book now'); ?>
                </a>
                <a href="<?php echo Utility::createUrl("cityOffers/single", array("slug" => $data->slug)); ?>" class="book-now btn">
                    <?php echo __('More info'); ?>
                </a>
            </div>
            <div class="divider grid_4"></div>
        </div>
        <div class="clearfix"></div>        
    </div>
</article>