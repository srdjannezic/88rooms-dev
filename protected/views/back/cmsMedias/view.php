<?php
$this->breadcrumbs=array(
	'Cms Medias'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CmsMedia','url'=>array('index')),
	array('label'=>'Create CmsMedia','url'=>array('create')),
	array('label'=>'Update CmsMedia','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete CmsMedia','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsMedia','url'=>array('admin')),
);
?>

<h1>View CmsMedia #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'media_type',
		'date_created',
	),
)); ?>
