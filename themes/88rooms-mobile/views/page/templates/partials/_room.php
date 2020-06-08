<div class="section-bg single-room section-<?php echo ($index == 0 || $index % 2 == 0) ? 'right' : 'left'; ?>">
    <span class="bg-rect"></span>
    <div class="container_12 cf">
        <div class="grid_8 first positioned-el modified">
            <img src="<?php echo $data->cmsMedia->_image_url; ?>" alt="<?php echo $data->name; ?>"/>
        </div>
        <div class="grid_4 first black-section modified">            
            <div class="title-bar cf">
                <div class="grid_3 first">
                    <h2><?php echo CHtml::link($data->name, array('rooms/view', 'slug' => $data->slug)); ?> <br/> <?php echo $data->price; ?> &euro; <span class="small"><?php echo __('per night'); ?></span></h2>
                </div>
                <?php if ($data->people): ?>
                    <div class="grid_1">
                        <div class="people-wrap">
                            <?php for ($i = 0; $i < $data->people; $i++): ?>
                                <span class="people-icon"></span>
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="inner-section">                
                <p><?php echo $data->description; ?></p>
                <ul class="room-facilities cf">
                    <?php foreach ($data->featuredFacilities as $facility): ?>
                        <li><?php echo $facility->name; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php echo CHtml::link(Translation::model()->getByKey('details_about_the_room'), array('rooms/view', 'slug' => $data->slug), array("class" => 'btn btn-read-more')); ?>
            </div>
        </div>        
    </div>
</div>