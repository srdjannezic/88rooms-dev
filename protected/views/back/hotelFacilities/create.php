<?php
$this->breadcrumbs=array(
	'Hotel Facilities'=>array('index'),
	__('Kreiraj'),
);

$this->menu=array(
array('label'=>'List HotelFacility','url'=>array('index')),
array('label'=>'Manage HotelFacility','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> Hotel Amenity</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>