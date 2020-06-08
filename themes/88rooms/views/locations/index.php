<?php Yii::import('ext.gmap.*'); ?>
<div class="archive-wrap">
    <div class="title">
        <h1><?php echo __('Hotel location and directions'); ?></h1>
    </div>
    <div class="big-map">
        <?php        
        $gMap = new EGMap();
        $gMap->setCenter($this->config->lat, $this->config->lng);
        $icon = new EGMapMarkerImage(Yii::app()->theme->baseUrl . "/assets/images/pins/88-pin.png");
        $icon->setSize(48, 57);
        $icon->setOrigin(0, 0);
        $gMap->addMarker(new EGMapMarker($this->config->lat, $this->config->lng, array("icon" => $icon)));
        ?>
        <ul class="pois container_12 cf">
            <?php foreach ($pois as $poi): ?>
                <li class="<?php echo $poi->color; ?>"><i style="background:<?php echo $poi->color; ?>"></i><?php echo $poi->name; ?></li>
                <?php
                $icon = new EGMapMarkerImage(Yii::app()->theme->baseUrl . "/assets/images/pins/$poi->color.png");
                $icon->setSize(30, 38);
                $icon->setOrigin(0, 0);
                $gMap->addMarker(new EGMapMarker($poi->lat, $poi->lng, array("icon" => $icon)));
                ?>
            <?php endforeach; ?>
        </ul>
        <?php
        $gMap->width = '100%';
        $gMap->height = 645;
        $gMap->zoom = 14;
        $gMap->renderMap();
        ?>
    </div>
    <div class="container_12 pos-rel locations-wrap cf">
        <span class="circles-big"></span>
        <span class="circles-small"></span>
        <?php
        $index = 0;
        foreach ($pois as $poi):
            ?>
            <?php echo $this->renderPartial("_view", array("data" => $poi, "index" => $index)); ?>
            <?php $index++; ?>
        <?php endforeach; ?>
    </div>
</div>