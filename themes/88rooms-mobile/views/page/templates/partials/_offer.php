<article class="single-view special-offer-single">    
    <div class="container_12 cf">
        <div class="grid_12 first last top-title">
            <h2><?php echo CHtml::link(CHtml::encode($data->title), array('specialOffers/view', 'slug' => $data->slug)); ?></h2>
            <div class="offer-info cf">
                <div class="single-info modified first"><?php echo Translation::model()->getByKey('minimum_stay') . "<b>" . $data->minimum_stay . "</b>"; ?></div>
                <div class="single-info modified first"><?php echo Translation::model()->getByKey('minimum_persons') . "<b>" . $data->minimum_persons . "</b>"; ?></div>
                <div class="single-info modified first"><?php echo Translation::model()->getByKey('price_from') . "<b>" . $data->price_from . " " . param("currency") . "</b>"; ?></div>
            </div>            
        </div>
        <div class="grid_12 first last thumb">  
            <span class="bg-rect"></span>
            <img src="<?php echo $data->cmsMedia->_thumb_url; ?>" />
        </div>
        <div class="grid_12 first last">            
            <p class="active-from"><?php echo Translation::model()->getByKey('active_for_the_period') . date('d F', strtotime($data->active_from)) . '-' . date('d F', strtotime($data->active_to)); ?></p>
            <p><?php echo $data->_excerpt; ?></p>
            <div class="buttons cf">
               <a href="<?php echo Utility::createUrl("site/bookNow", array("id" => $data->offer_id, "nights" => $data->minimum_stay)); ?>" class="btn btn-black grid_6 first">
                    <?php echo Translation::model()->getByKey('book_now'); ?>
                </a>         
                <a href="<?php echo Utility::createUrl("specialOffers/view", array("slug" => $data->slug)); ?>" class="btn btn-white grid_6 last">
                    <?php echo Translation::model()->getByKey('more_info'); ?>
                </a>
            </div>
            <div class="divider grid_12"></div>
        </div>
        <div class="clearfix"></div>        
    </div>
</article>