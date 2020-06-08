<?php
$this->breadcrumbs=array(
	'Menu Items'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MenuItem','url'=>array('index')),
	array('label'=>'Create MenuItem','url'=>array('create')),
	array('label'=>'Update MenuItem','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MenuItem','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MenuItem','url'=>array('admin')),
);
?>

<h1>View MenuItem #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'url',
		'cms_object_id',
		'class',
		'target',
		'ordr',
		'menu_id',
	),
)); ?>
