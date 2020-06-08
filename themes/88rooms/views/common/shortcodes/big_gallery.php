<div class="big-gallery-wrap">
    <div class="big-gallery royalSlider rsDefault visibleNearby">    
        <?php foreach ($model->cmsGalleryItems as $slide): ?>
            <?php if (substr($slide->cmsMedia->media_type, 0, 5) == "video"): ?>
                <a class="rsImg" href="<?php echo $slide->cmsMedia->_image_url; ?>" data-rsw="632" data-rsh="500" data-rsVideo="http://www.youtube.com/watch?v=<?php echo $slide->cmsMedia->video_id; ?>"></a>            
            <?php elseif (substr($slide->cmsMedia->media_type, 0, 6) == "video/v"): ?>
                <a class="rsImg" href="<?php echo $slide->cmsMedia->_image_url; ?>" data-rsw="632" data-rsh="500" data-rsVideo="https://vimeo.com/<?php echo $slide->cmsMedia->video_id; ?>"></a>
            <?php else: ?>
                <a class="rsImg" href="<?php echo $slide->cmsMedia->_image_url; ?>"></a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="frame">
        <ul class="thumbnails">
            <?php foreach ($model->cmsGalleryItems as $slide): ?>
                <?php $class = ''; ?>
                <?php if (substr($slide->cmsMedia->media_type, 0, 5) == "video"): ?>
                    <?php $class = 'video'; ?>
                <?php endif; ?>
                <li class="slide play3 <?php echo $class; ?>">
                    <span class="<?php echo $class; ?>"></span>
                    <img src="<?php echo $slide->cmsMedia->_thumb_url; ?>" /> 
                </li>            
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="scrollbar">
        <div class="handle">
            <div class="mousearea"></div>
        </div>
    </div>
</div>