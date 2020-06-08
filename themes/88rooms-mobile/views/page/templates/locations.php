 <?php $pois = PointOfInterest::model()->visible()->findAll(array("order" => "ordr ASC")); ?>
<div class="big-map">
    <?php
    $gMap = new EGMap();
    $gMap->setCenter($this->config->lat, $this->config->lng);
    $icon = new EGMapMarkerImage(Yii::app()->theme->baseUrl . "/assets/images/pins/88-pin.png");
    $icon->setSize(48, 57);
    $icon->setOrigin(0, 0);
    $gMap->addMarker(new EGMapMarker($this->config->lat, $this->config->lng, array("icon" => $icon)));
    $gMap->width = '100%';
    $gMap->height = 645;
    $gMap->zoom = 10;
    foreach ($pois as $poi):
        $icon = new EGMapMarkerImage(Yii::app()->theme->baseUrl . "/assets/images/pins/$poi->color.png");
        $icon->setSize(30, 38);
        $icon->setOrigin(0, 0);
        $gMap->addMarker(new EGMapMarker($poi->lat, $poi->lng, array("icon" => $icon)));
    endforeach;
    $gMap->renderMap();
    ?>
</div>
<div class="pois container_12 cf">
    <h2><?php echo Translation::model()->getByKey('agenda'); ?></h2>
    <ul>       
        <?php foreach ($pois as $poi): ?>
            <li class="<?php echo $poi->color; ?>"><i></i><?php echo $poi->name; ?> (<?php echo $poi->distance; ?>)</li>
        <?php endforeach; ?>
    </ul>
</div>