<?php
$this->breadcrumbs=array(
	'Hotel Rooms'=>array('index'),
	__('Kreiraj'),
);

$this->menu=array(
array('label'=>'List HotelRoom','url'=>array('index')),
array('label'=>'Manage HotelRoom','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> HotelRoom</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>