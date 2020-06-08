<?php
$this->breadcrumbs=array(
	'Languages'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	__('Update'),
);

$this->menu=array(
array('label'=>'List Language','url'=>array('index')),
array('label'=>'Create Language','url'=>array('create')),
array('label'=>'View Language','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage Language','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> Language <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>