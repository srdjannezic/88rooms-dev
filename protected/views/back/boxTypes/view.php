<?php
$this->breadcrumbs=array(
	'Box Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BoxType','url'=>array('index')),
	array('label'=>'Create BoxType','url'=>array('create')),
	array('label'=>'Update BoxType','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete BoxType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BoxType','url'=>array('admin')),
);
?>

<h1>View BoxType #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
	),
)); ?>
