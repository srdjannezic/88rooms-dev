<?php
$this->breadcrumbs=array(
	'Cms Objects'=>array('index'),
	__('Create'),
);

$this->menu=array(
array('label'=>'List CmsObject','url'=>array('index')),
array('label'=>'Manage CmsObject','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> CmsObject</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>