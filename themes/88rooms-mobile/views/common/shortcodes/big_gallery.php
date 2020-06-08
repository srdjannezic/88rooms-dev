<div class="container_12 cf">
    <?php $i = 0; ?>
    <?php foreach ($model->cmsGalleryItems as $slide): ?> 
        <?php $class = ''; ?>
        <div class="grid_6 <?php echo ($i == 0 || $i % 2 == 0) ? 'first' : ''; ?> <?php echo ($i % 2 == 0) ? 'last' : ''; ?> thumbnail">
            <?php if (substr($slide->cmsMedia->media_type, 0, 5) == "video"): ?>
                <?php $url = "http://www.youtube.com/embed/" . $slide->cmsMedia->video_id . "?autohide=1&border=0&egm=0&showinfo=0&showsearch=0"; ?>
                <?php $class = 'video'; ?>
            <?php elseif (substr($slide->cmsMedia->media_type, 0, 6) == "video/v"): ?>
                <?php $url = "//player.vimeo.com/video/" . $slide->cmsMedia->video_id . "?title=0&byline=0&badge=0"; ?>                
                <?php $class = 'video'; ?>
            <?php else: ?>
                <?php $url = $slide->cmsMedia->_image_url; ?>
            <?php endif; ?>
            <a href="<?php echo $url; ?>" class="thumbnail-link <?php echo $class; ?>">
                <span class="<?php echo $class; ?>"></span>
                <img src="<?php echo $slide->cmsMedia->_thumb_url; ?>" />                
            </a>
        </div>
        <?php $i++; ?>
    <?php endforeach; ?>
</div>