<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	__('Update'),
);

$this->menu=array(
array('label'=>'List Menu','url'=>array('index')),
array('label'=>'Create Menu','url'=>array('create')),
array('label'=>'View Menu','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage Menu','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> Menu <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>