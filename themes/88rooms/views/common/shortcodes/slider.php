
<div class="flexslider flex-inner">
    <ul class="slides">
        <?php foreach ($slides as $slide): ?>
            <li>
                <img src="<?php echo $slide->cmsMedia->_image_url; ?>" alt="<?php echo $slide->cmsMedia->title; ?>"/>
            </li>
        <?php endforeach; ?>
    </ul>
</div>