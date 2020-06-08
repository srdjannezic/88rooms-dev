<?php
$this->breadcrumbs=array(
	'Hotel Facilities Categories'=>array('index'),
	__('Kreiraj'),
);

$this->menu=array(
array('label'=>'List HotelFacilitiesCategory','url'=>array('index')),
array('label'=>'Manage HotelFacilitiesCategory','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> HotelFacilitiesCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>