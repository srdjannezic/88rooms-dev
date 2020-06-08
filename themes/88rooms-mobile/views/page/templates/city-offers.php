<?php

$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => CityOffer::model()->visible()->search(),
    'template' => "{items}\n{pager}",
    'itemView' => '//page/templates/partials/_city_offer',
    'htmlOptions' => array(
        'class' => 'archive'
    )
));
?>