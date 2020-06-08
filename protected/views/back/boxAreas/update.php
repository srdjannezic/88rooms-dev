<?php
$this->breadcrumbs=array(
	'Box Areas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	__('Update'),
);

$this->menu=array(
array('label'=>'List BoxArea','url'=>array('index')),
array('label'=>'Create BoxArea','url'=>array('create')),
array('label'=>'View BoxArea','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage BoxArea','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> BoxArea <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>