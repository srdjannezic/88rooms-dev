<?php
$this->breadcrumbs=array(
	'Box Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	__('Update'),
);

$this->menu=array(
array('label'=>'List BoxType','url'=>array('index')),
array('label'=>'Create BoxType','url'=>array('create')),
array('label'=>'View BoxType','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage BoxType','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> BoxType <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>