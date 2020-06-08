<article class="single-view single-loop">    
    <div class="container_12 cf">
        <div class="grid_12 first last top-title">            
            <h2><?php echo CHtml::link(CHtml::encode($data->title), array('cityOffers/view', 'slug' => $data->slug)); ?></h2>
        </div>
        <div class="grid_12 first last thumb">
            <span class="bg-rect"></span>
            <img src="<?php echo $data->cmsMedia->_image_url; ?>" />
        </div>
        <div class="grid_12 first last">            
            <p class="excerpt"><?php echo $data->_excerpt; ?></p>
            <p class="read-more"><?php echo CHtml::link(Translation::model()->getByKey('read_more'), array('cityOffers/view', 'slug' => $data->slug)); ?></p>
            <div class="divider grid_12"></div>
        </div>
        <div class="clearfix"></div>        
    </div>
</article>