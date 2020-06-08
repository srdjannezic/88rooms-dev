<?php
$this->breadcrumbs = array(
    'Hotel Facilities' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    __('Izmeni'),
);

$this->menu = array(
    array('label' => 'List HotelFacility', 'url' => array('index')),
    array('label' => 'Create HotelFacility', 'url' => array('create')),
    array('label' => 'View HotelFacility', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage HotelFacility', 'url' => array('admin')),
);
?>
<h1><?php echo __('Update'); ?> <?php echo __('a'); ?> Room Amenity<?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>