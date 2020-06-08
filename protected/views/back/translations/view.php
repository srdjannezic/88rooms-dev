<?php
$this->breadcrumbs=array(
	'Translations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Translation','url'=>array('index')),
	array('label'=>'Create Translation','url'=>array('create')),
	array('label'=>'Update Translation','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Translation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Translation','url'=>array('admin')),
);
?>

<h1>View Translation #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'key',
		'word',
	),
)); ?>
