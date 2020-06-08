<?php
$this->breadcrumbs = array(
    'Hotel Facilities' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List HotelFacility', 'url' => array('index')),
    array('label' => 'Create HotelFacility', 'url' => array('create')),
    array('label' => 'Update HotelFacility', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete HotelFacility', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage HotelFacility', 'url' => array('admin')),
);
?>

<h1>View HotelFacility #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'hotel_facilities_category_id',
        'ordr',
    ),
));
?>