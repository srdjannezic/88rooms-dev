<?php
$this->breadcrumbs=array(
	'Hotel Rooms'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List HotelRoom','url'=>array('index')),
	array('label'=>'Create HotelRoom','url'=>array('create')),
	array('label'=>'Update HotelRoom','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete HotelRoom','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HotelRoom','url'=>array('admin')),
);
?>

<h1>View HotelRoom #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'price',
		'people',
		'description',
	),
)); ?>
