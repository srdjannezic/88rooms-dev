<?php
$this->breadcrumbs = array(
    'Hotel Facilities' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List HotelFacility', 'url' => array('index')),
    array('label' => 'Create HotelFacility', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hotel-facility-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Room Amenities</h1>

<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("hotelFacilities/create")
    ));
    ?>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'hotel-facility-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        'hotel_facilities_category_id',
        'ordr',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',
        ),
    ),
));
?>
