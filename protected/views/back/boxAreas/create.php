<?php
$this->breadcrumbs=array(
	'Box Areas'=>array('index'),
	__('Create'),
);

$this->menu=array(
array('label'=>'List BoxArea','url'=>array('index')),
array('label'=>'Manage BoxArea','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> BoxArea</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>