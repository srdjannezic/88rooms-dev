<article class="single-view single-poi grid_4 <?php echo ($index == 0 || $index % 3 == 0) ? 'first' : ''; ?>">    
    <div class="thumb">
        <img src="<?php echo $data->cmsMedia->_thumb_url; ?>" />
        <div class="title-small">
            <h2 class="iconpin-<?php echo $data->color;?>"><?php echo $data->name; ?></h2>
        </div>
    </div>
</article>