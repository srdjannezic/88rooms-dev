<div class="main-slider-wrap">
    <div class="flexslider main-slider">
        <ul class="slides">
            <div id="TA_certificateOfExcellence377" class="TA_certificateOfExcellence"><ul id="2XAxjRyU2L" class="TA_links PLn8vAZQeUJz"><li id="Jt4aZwIJv" class="ZXe6dz0"><a target="_blank" href="https://www.tripadvisor.rs/Hotel_Review-g294472-d6276954-Reviews-88_Rooms_Hotel-Belgrade.html"><img src="https://www.tripadvisor.rs/img/cdsi/img2/awards/CoE2017_WidgetAsset-14348-2.png" alt="TripAdvisor" class="widCOEImg" id="CDSWIDCOELOGO"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=certificateOfExcellence&uniq=377&locationId=6276954&lang=sr&year=2018&display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
            <?php foreach ($slider->cmsSlides as $slide): ?>
                <li>
                    <img src="<?php echo $slide->cmsMedia->_image_url; ?>" />   
                </li>
            <?php endforeach; ?>
        </ul>    
    </div>    
</div>
<?php if ($slider->sliderBoxes): ?>
    <?php $i = 0; ?>
    <div class="slider-boxes">
        <div class="cntrls"></div>
        <ul class="slides">
            <?php foreach ($slider->sliderBoxes as $box): ?>
                <li>
                    <div class="grid_slide">
                        <h2><?php echo CHtml::link(CHtml::encode($box->title), $box->url); ?></h2>
                        <p><?php echo $box->text; ?></p>
                        <?php echo CHtml::link(CHtml::encode($box->btn_text), $box->url, array("class" => "btn btn-slider")); ?>
                    </div>
                </li>                
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>