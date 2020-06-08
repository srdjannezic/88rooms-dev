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
        <?php $pois = PointOfInterest::model()->visible()->findAll(array("order" => "ordr ASC")); ?>
        <?php foreach ($pois as $poi): ?>
            <li class="<?php echo $poi->color; ?>"><i></i><?php echo $poi->subtitle; ?></li>
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
    $gMap->zoom = 12;
    $gMap->renderMap();
    ?>
</div>
<div class="locations-wrap">
    <span class="circles-big"></span>
    <span class="circles-small"></span>
    <div class="container_12 pos-rel cf">
        <?php
        $index = 0;
        foreach ($pois as $poi):
            ?>
            <?php echo $this->renderPartial("//page/templates/partials/location", array("data" => $poi, "index" => $index)); ?>
            <?php $index++; ?>
        <?php endforeach; ?>
    </div>
</div>