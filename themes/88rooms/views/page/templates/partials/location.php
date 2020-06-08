<article class="single-view single-poi grid_4 <?php echo ($index == 0 || $index % 3 == 0) ? 'first' : ''; ?>">    
    <div class="thumb">        
        <img src="<?php echo Yii::app()->iwi->load($data->cmsMedia->_image_path)->adaptive(336, 220)->cache(); ?>" alt="<?php echo $data->name; ?>"/>            
        <span class="overlay"></span>
    </div>
    <div class="title-small">
        <h2 class="iconpin-<?php echo $data->color; ?>"><?php echo $data->name; ?> (<?php echo $data->distance; ?>)</h2>
    </div>
</article>