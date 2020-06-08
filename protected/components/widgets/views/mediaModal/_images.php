<?php

$this->widget('bootstrap.widgets.TbListView', array(
    'id' => 'media-modal-list',
    'dataProvider' => CmsMedia::model()->search(),
    'itemView' => $this->getViewPath() . '/media-modal/_view.php',
    'itemsCssClass' => 'cf'
));
?>