<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $offers,
    'summaryText' => '',
    'itemView' => 'partials/_offers',
));
?>