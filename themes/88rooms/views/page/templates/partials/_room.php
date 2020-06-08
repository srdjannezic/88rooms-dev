<div class="section-bg single-room section-<?php echo ($index == 0 || $index % 2 == 0) ? 'right' : 'left'; ?>">
    <div class="container_12 cf">
        <span class="rect-small top-corner"></span>
        <span class="rect-big top-corner"></span>
        <span class="bg-rect"></span>
        <div class="grid_4 first black-section modified">
            <span class="rect-big bottom-corner"></span>
            <div class="title-bar cf">
                <div class="grid_3 first">
                    <h2><?php echo CHtml::link($data->name, array('rooms/view', 'slug' => $data->slug),array('title'=> CHtml::encode($data->name))); ?> - <?php echo $data->price; ?> &euro; <span class="small"><?php echo Translation::model()->getByKey('per_night'); ?></span></h2>
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
                <div class="room-facilities cf">
                    <?php $i = 1; ?>
                    <?php $count = count($data->featuredFacilities); ?>
                    <?php $half = ceil($count / 2); ?>
                    <?php $half_floor = floor($count / 2); ?>
                    <?php foreach ($data->featuredFacilities as $facility): ?>                        
                        <?php if ($i == 1 || $i % 4 == 0): ?>
                            <div class="grid">
                                <ul>
                                <?php endif; ?>

                                <li><?php echo $facility->name; ?></li>
                                <?php if ($i % 3 == 0 || $i == $count): ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php $i++; ?>                    
                    <?php endforeach; ?>
                </div>
                <?php echo CHtml::link(Translation::model()->getByKey('details_about_the_room'), array('rooms/view', 'slug' => $data->slug), array("class" => 'btn btn-read-more', "title" => $data->name)); ?>
            </div>
        </div>        
        <div class="grid_8 first positioned-el modified">
            <img src="<?php echo $data->cmsMedia->_image_url; ?>" alt="<?php echo $data->name; ?>"/>
        </div>
    </div>
</div>