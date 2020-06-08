<?php
$this->breadcrumbs=array(
	'Cms Objects'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	__('Izmeni'),
);

$this->menu=array(
array('label'=>'List CmsObject','url'=>array('index')),
array('label'=>'Create CmsObject','url'=>array('create')),
array('label'=>'View CmsObject','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage CmsObject','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> <?php echo ucfirst($model->object_type);?> #<?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>