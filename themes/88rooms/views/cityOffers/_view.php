<article class="single-view grid_4 <?php echo ($index == 0 || $index % 3 == 0) ? 'first' : ''; ?>">    
    <div class="thumb">
        <img src="<?php echo $data->cmsMedia->_thumb_url; ?>" />
        <div class="title-small">
            <h2><?php echo CHtml::link(CHtml::encode($data->title), array('single', 'slug' => $data->slug)); ?></h2>
        </div>
    </div>
</article>