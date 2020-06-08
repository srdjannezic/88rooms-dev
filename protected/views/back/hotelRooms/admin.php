<?php
$this->breadcrumbs = array(
    'Hotel Rooms' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List HotelRoom', 'url' => array('index')),
    array('label' => 'Create HotelRoom', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hotel-room-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Hotel Rooms</h1>

<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("hotelRooms/create")
    ));
    ?>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'hotel-room-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        'price',
        'people',
        'description',
        array(
            "name" => 'visible',
            'value' => '($data->visible) ? "Yes" : "No"',
            'filter' => array("1" => "Yes", "0" => "No")
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',
        ),
    ),
));
?>
