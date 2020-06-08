<?php
$this->breadcrumbs=array(
	'Box Types'=>array('index'),
	__('Create'),
);

$this->menu=array(
array('label'=>'List BoxType','url'=>array('index')),
array('label'=>'Manage BoxType','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> BoxType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>