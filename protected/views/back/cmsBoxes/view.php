<?php
$this->breadcrumbs=array(
	'Cms Boxes'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CmsBox','url'=>array('index')),
	array('label'=>'Create CmsBox','url'=>array('create')),
	array('label'=>'Update CmsBox','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete CmsBox','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsBox','url'=>array('admin')),
);
?>

<h1>View CmsBox #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cms_object_id',
		'text',
		'btn_text',
		'url',
		'cms_media_id',
		'cms_block_id',
		'title',
		'ordr',
	),
)); ?>
