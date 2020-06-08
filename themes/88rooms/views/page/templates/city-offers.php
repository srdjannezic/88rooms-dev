<?php

$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => CityOffer::model()->search(NULL, $pageSize = 10),
    'template' => "{items}\n{pager}",
    'itemView' => '//page/templates/partials/_city_offer',
    'htmlOptions' => array(
        'class' => 'archive'
    ),
    'pager' => array(
        'class' => 'SimplePager',
        'nextPageLabel' => Translation::model()->getByKey('previous'),
        'prevPageLabel' => Translation::model()->getByKey('next'),
        'header' => '',
        'previousPageCssClass' => 'grid_6 first prev', //default "previours"
        'nextPageCssClass' => 'grid_6 next', //default "next"
        'htmlOptions' => array(
            'class' => ''
        )
    ),
    'pagerCssClass' => 'container_12 pagination cf'
));
?>