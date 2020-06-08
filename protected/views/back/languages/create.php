<?php
$this->breadcrumbs=array(
	'Languages'=>array('index'),
	__('Create'),
);

$this->menu=array(
array('label'=>'List Language','url'=>array('index')),
array('label'=>'Manage Language','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> Language</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>