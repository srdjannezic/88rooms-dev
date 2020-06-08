<?php
$this->breadcrumbs=array(
	'Hotel Rooms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	__('Izmeni'),
);

$this->menu=array(
array('label'=>'List HotelRoom','url'=>array('index')),
array('label'=>'Create HotelRoom','url'=>array('create')),
array('label'=>'View HotelRoom','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage HotelRoom','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> HotelRoom <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>