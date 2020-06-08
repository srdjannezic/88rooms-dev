<?php
$criteria = new CDbCriteria();
$criteria->compare("user_id", $model->id);
$criteria->condition = "user_billboard_id IS NULL";
$criteria->together = true;

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'user-post-grid',
    'dataProvider' => $posts->search($criteria),
    'filter' => $posts,
    'columns' => array(
        'id',
        'title',
        'latitude',
        'longitude',
        'text',
        'date',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));