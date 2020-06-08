<?php
$this->breadcrumbs=array(
	'Foods'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Food','url'=>array('index')),
	array('label'=>'Create Food','url'=>array('create')),
	array('label'=>'Update Food','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Food','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Food','url'=>array('admin')),
);
?>

<h1>View Food #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'carbonHydrate',
		'fat',
		'proteins',
		'callories',
		'foodCategoryId',
	),
)); ?>
