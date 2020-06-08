<?php
$this->breadcrumbs = array(
    'Hotel Facilities Categories' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List HotelFacilitiesCategory', 'url' => array('index')),
    array('label' => 'Create HotelFacilitiesCategory', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hotel-facilities-category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Room Amenities Categories</h1>

<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("hotelFacilitiesCategories/create")
    ));
    ?>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'hotel-facilities-category-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        'ordr',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
