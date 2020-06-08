<?php

$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => CmsObject::model()->posts()->visible()->search(NULL, $pageSize = 5),
    'template' => "{items}\n{pager}",
    'itemView' => '//page/templates/partials/_news',
    'htmlOptions' => array(
        'class' => 'archive'
    ),
    'pager' => array(
        'class' => 'SimplePager',
        'nextPageLabel' => Translation::model()->getByKey('older'),
        'prevPageLabel' => Translation::model()->getByKey('newer'),
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