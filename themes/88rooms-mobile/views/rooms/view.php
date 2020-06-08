<div class="title">
    <h1><?php echo __('88 Rooms'); ?> - <?php echo $model->name; ?></h1>
</div>
<div class="section-bg single-room section-right">
    <span class="bg-rect"></span>
    <div class="container_12 cf">
        <div class="grid_8 first positioned-el modified">
            <?php if ($model->cms_gallery_id): ?>
                <?php echo $this->renderPartial("//common/shortcodes/slider", array("slides" => $model->cmsGallery->cmsGalleryItems)); ?>
            <?php else: ?>
                <img src="<?php echo $model->cmsMedia->_image_url; ?>" alt="<?php echo $data->name; ?>"/>
            <?php endif; ?>
        </div>
        <div class="grid_4 first black-section modified">
            <div class="title-bar cf">
                <div class="grid_3 first">
                    <h2><?php echo $model->name; ?> <br/> <?php echo $model->price; ?> &euro; <span class="small"><?php echo __('per night'); ?></span></h2>
                </div>
                <?php if ($model->people): ?>
                    <div class="grid_1">
                        <div class="people-wrap">
                            <?php for ($i = 0; $i < $model->people; $i++): ?>
                                <span class="people-icon"></span>
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="inner-section">                
                <p><?php echo $model->description; ?></p>                
            </div>
        </div>        
    </div>
</div>

<div class="section-facilities container_12 cf">
    <?php $i = 0; ?>
    <?php foreach ($model->facilityCategories as $category): ?>
        <div class="grid_3 <?php echo ($i == 0 || $i % 2 == 0) ? 'first' : ''; ?>">
            <h3><?php echo $category->name; ?></h3>
            <?php $fac = $model->getFacilitiesByCategory($category->id); ?>
            <ul class="category-facilities">               
                <?php foreach ($fac as $facility): ?>
                    <li><?php echo $facility->hotelFacility->name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php $i++; ?>
    <?php endforeach; ?>
</div>