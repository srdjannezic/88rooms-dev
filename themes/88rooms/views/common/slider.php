<div class="flexslider loading single-slider <?php echo (isset($class) ? $class : ""); ?>">
    <ul class="slides">
        <div id="TA_certificateOfExcellence377" class="TA_certificateOfExcellence"><ul id="2XAxjRyU2L" class="TA_links PLn8vAZQeUJz"><li id="Jt4aZwIJv" class="ZXe6dz0"><a target="_blank" href="https://www.tripadvisor.rs/Hotel_Review-g294472-d6276954-Reviews-88_Rooms_Hotel-Belgrade.html"><img src="https://www.tripadvisor.rs/img/cdsi/img2/awards/CoE2017_WidgetAsset-14348-2.png" alt="TripAdvisor" class="widCOEImg" id="CDSWIDCOELOGO"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=certificateOfExcellence&uniq=377&locationId=6276954&lang=sr&year=2018&display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
        <?php foreach ($slider->cmsSlides as $slide): ?>
            <li>
                <img src="<?php echo $slide->cmsMedia->_image_url; ?>" />                
            </li>
        <?php endforeach; ?>
    </ul>
    <?php if ($slider->sliderBoxes): ?>
        <div class="slider-boxes">
            <div class="slider_boxes_wrap">
                <?php foreach ($slider->sliderBoxes as $box): ?>
                    <div class="grid_slide">
                        <h2><?php echo CHtml::link(CHtml::encode($box->title), $box->url); ?></h2>
                        <p><?php echo $box->text; ?></p>
                        <?php echo CHtml::link(CHtml::encode($box->btn_text), $box->url, array("class" => "btn btn-slider")); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>