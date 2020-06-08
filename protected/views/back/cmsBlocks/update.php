<?php
$this->breadcrumbs=array(
	'Cms Blocks'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	__('Update'),
);

$this->menu=array(
array('label'=>'List CmsBlock','url'=>array('index')),
array('label'=>'Create CmsBlock','url'=>array('create')),
array('label'=>'View CmsBlock','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage CmsBlock','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> CmsBlock <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>