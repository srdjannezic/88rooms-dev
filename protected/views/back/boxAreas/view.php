<?php
$this->breadcrumbs=array(
	'Box Areas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BoxArea','url'=>array('index')),
	array('label'=>'Create BoxArea','url'=>array('create')),
	array('label'=>'Update BoxArea','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete BoxArea','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BoxArea','url'=>array('admin')),
);
?>

<h1>View BoxArea #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
