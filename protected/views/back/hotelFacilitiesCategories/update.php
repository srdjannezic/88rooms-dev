<?php
$this->breadcrumbs=array(
	'Hotel Facilities Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	__('Izmeni'),
);

$this->menu=array(
array('label'=>'List HotelFacilitiesCategory','url'=>array('index')),
array('label'=>'Create HotelFacilitiesCategory','url'=>array('create')),
array('label'=>'View HotelFacilitiesCategory','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage HotelFacilitiesCategory','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> HotelFacilitiesCategory <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>