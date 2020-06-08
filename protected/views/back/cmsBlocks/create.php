<?php
$this->breadcrumbs=array(
	'Cms Blocks'=>array('index'),
	__('Create'),
);

$this->menu=array(
array('label'=>'List CmsBlock','url'=>array('index')),
array('label'=>'Manage CmsBlock','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> CmsBlock</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>