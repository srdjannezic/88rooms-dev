<?php
$criteria = new CDbCriteria();
$criteria->compare("user_id", $model->id);
$criteria->together = true;

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'user-billboard-grid',
    'dataProvider' => $billboards->search($criteria),
    'filter' => $billboards,
    'columns' => array(
        'id',
        'title',
        'latitude',
        'longitude',
        'description',
        'date',        
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));