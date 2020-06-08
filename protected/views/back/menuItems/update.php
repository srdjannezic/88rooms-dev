<?php
$this->breadcrumbs=array(
	'Menu Items'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	__('Update'),
);

$this->menu=array(
array('label'=>'List MenuItem','url'=>array('index')),
array('label'=>'Create MenuItem','url'=>array('create')),
array('label'=>'View MenuItem','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage MenuItem','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> MenuItem <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>