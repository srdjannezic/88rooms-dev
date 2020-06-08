<?php
$this->breadcrumbs=array(
	'Cms Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CmsCategory','url'=>array('index')),
	array('label'=>'Create CmsCategory','url'=>array('create')),
	array('label'=>'Update CmsCategory','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete CmsCategory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsCategory','url'=>array('admin')),
);
?>

<h1>View CmsCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'slug',
		'date_created',
		'user_id',
	),
)); ?>
