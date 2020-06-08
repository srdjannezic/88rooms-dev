<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	__('Create'),
);

$this->menu=array(
array('label'=>'List Menu','url'=>array('index')),
array('label'=>'Manage Menu','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> Menu</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>