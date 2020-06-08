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
            <h2><?php echo CHtml::link(CHtml::encode($data->title), array('cityOffers/view', 'slug' => $data->slug),array('title'=> CHtml::encode($data->title))); ?></h2>            
            <p><?php echo $data->_excerpt; ?></p>
            <p class="read-more"><?php echo CHtml::link(Translation::model()->getByKey('read_more'), array('cityOffers/view', 'slug' => $data->slug),array('title'=> CHtml::encode($data->title))); ?></p>            
        </div>
        <div class="clearfix"></div>
        <div class="divider-new prefix_8 grid_4"></div>
        <div class="clearfix"></div>
    </div>
</article>