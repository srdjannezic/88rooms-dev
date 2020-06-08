<?php

$this->widget('bootstrap.widgets.TbListView', array(
    'id' => 'media-modal-list',
    'dataProvider' => CmsMedia::model()->search(),
    'itemView' => '/cmsMedias/_view',
    'itemsCssClass' => 'cf'
));
?>