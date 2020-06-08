<article class="single-view">
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
            <time><?php echo Utility::dateFormat($model->date_created); ?></time>
            <p class="excerpt"><?php echo $data->text; ?></p>
            <p class="read-more"><?php echo CHtml::link(__('Read more'), array('single', 'slug' => $data->slug)); ?></p>
            <div class="divider grid_4"></div>
        </div>
        <div class="clearfix"></div>        
    </div>
</article>