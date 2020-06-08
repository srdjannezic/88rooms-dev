<div class="section-bg featured-room">
    <div class="container_12 cf featured-room-content">        
        <div class="grid_8 first positioned-el modified">
            <img src="<?php echo $model->cmsMedia->_image_url; ?>" />
        </div>
        <div class="grid_4 first black-section modified">
            <div class="title-bar">
                <h2><?php echo __(sprintf('Featured room: %s', $model->name)); ?></h2>
            </div>
            <div class="inner-section">                
                <?php echo $model->description; ?>
                <ul class="room-facilities cf">
                    <?php foreach ($model->featuredFacilities as $facility): ?>
                        <li><?php echo $facility->name; ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?php echo Utility::createUrl("rooms/view", array("slug" => $model->slug)); ?>" class="btn btn-read-more" title="<?php echo $model->name; ?>">
                    <?php echo sprintf(Translation::model()->getByKey('featured_room_details'), $model->name); ?>
                </a>
            </div>
        </div>
    </div>
</div>