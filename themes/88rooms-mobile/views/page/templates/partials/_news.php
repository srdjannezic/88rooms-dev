<article class="single-view single-loop">    
    <div class="container_12 cf">
        <div class="grid_12 first last top-title">
            <h2><?php echo CHtml::link(CHtml::encode($data->title), array('news/view', 'slug' => $data->slug)); ?></h2>
            <time><?php echo Utility::dateFormat($data->date_created); ?></time>
        </div>
        <div class="grid_12 first last thumb">
            <span class="bg-rect"></span>
            <img src="<?php echo $data->cmsMedia->_thumb_url; ?>" />
        </div>
        <div class="grid_12 first last">            
            <p class="excerpt"><?php echo $data->_excerpt; ?></p>
            <p class="read-more"><?php echo CHtml::link(Translation::model()->getByKey('read_more'), array('news/view', 'slug' => $data->slug)); ?></p>
            <div class="divider"></div>
        </div>
        <div class="clearfix"></div>        
    </div>
</article>