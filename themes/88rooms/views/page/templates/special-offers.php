<?php

$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => SpecialOffer::model()->visible()->search(NULL, $pageSize = 10),
    'template' => "{items}\n{pager}",
    'itemView' => '//page/templates/partials/_offer',
    'htmlOptions' => array(
        'class' => 'archive'
    ),
    'pager' => array(
        'class' => 'SimplePager',
        'nextPageLabel' => Translation::model()->getByKey('previous'),
        'prevPageLabel' => Translation::model()->getByKey('next'),
        'header' => '',
        'previousPageCssClass' => 'grid_2 first prev', //default "previours"
        'nextPageCssClass' => 'grid_2 next', //default "next"
        'htmlOptions' => array(
            'class' => 'prefix_4'
        )
    ),
    'pagerCssClass' => 'container_12 pagination cf'
));
?>