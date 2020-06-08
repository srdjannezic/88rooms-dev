<?php

$this->widget('bootstrap.widgets.TbListView', array(
    'id' => 'media-modal-list',
    'dataProvider' => CmsMedia::model()->search(),
    'itemView' => '//mediaModal/_view',
    'itemsCssClass' => 'cf'
));
?>