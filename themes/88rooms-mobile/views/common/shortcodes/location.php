<div class="section-bg section-<?php echo $direction; ?>">
    <span class="bg-rect"></span>
    <div class="container_12 cf">        
        <div class="grid_6 first positioned-el modified">
            <?php
            Yii::import('ext.gmap.*');
            $gMap = new EGMap();
            $gMap->setCenter($this->config->lat, $this->config->lng);
            $icon = new EGMapMarkerImage(Yii::app()->theme->baseUrl . "/assets/images/pins/88-pin.png");
            $icon->setSize(48, 57);
            $icon->setOrigin(0, 0);

            $icon_dt = new EGMapMarkerImage(Yii::app()->theme->baseUrl . "/assets/images/pins/downtown.png");
            $icon_dt->setSize(48, 57);
            $icon_dt->setOrigin(0, 0);
            $gMap->addMarker(new EGMapMarker($this->config->lat, $this->config->lng, array("icon" => $icon)));
            $gMap->addMarker(new EGMapMarker($this->config->downtown_lat, $this->config->downtown_lng, array("icon" => $icon_dt)));
            $gMap->width = '100%';
            $gMap->height = 300;
            $gMap->zoom = 14;
            $gMap->renderMap();
            ?>
        </div>
        <div class="grid_6 first black-section modified">
            <div class="title-bar">
                <h2><?php echo $title; ?></h2>
            </div>
            <div class="inner-section">                
                <?php echo $content; ?>
                <a href="<?php echo $url; ?>" class="btn btn-read-more" title="<?php echo $title; ?>"><?php echo $btn_text; ?></a>
            </div>
        </div>        
    </div>
</div>