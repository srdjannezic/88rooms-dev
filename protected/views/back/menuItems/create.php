<?php
$this->breadcrumbs=array(
	'Menu Items'=>array('index'),
	__('Create'),
);

$this->menu=array(
array('label'=>'List MenuItem','url'=>array('index')),
array('label'=>'Manage MenuItem','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> MenuItem</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>