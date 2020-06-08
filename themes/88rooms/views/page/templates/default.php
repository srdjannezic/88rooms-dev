<article class="single-view single-post">
    <div class="bg-left-black">
        <span class="rect-bg"></span>
    </div>
    <div class="container_12 pos-rel">
        <span class="overlay-top"></span>
        <div class="grid_4 first thumb">            
            <img src="<?php echo $model->cmsMedia->_thumb_url; ?>" />            
            <span class="overlay"></span>
        </div>
        <div class="grid_8 last">
            <h2><?php echo $model->title; ?></h2>
            <p><?php echo $model->text; ?></p>
            <div class="divider grid_4"></div>
        </div>
        <div class="clearfix"></div>        
    </div>
</article>