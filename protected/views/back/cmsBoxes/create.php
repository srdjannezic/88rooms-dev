<?php
$this->breadcrumbs=array(
	'Cms Boxes'=>array('index'),
	__('Create'),
);

$this->menu=array(
array('label'=>'List CmsBox','url'=>array('index')),
array('label'=>'Manage CmsBox','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> CmsBox</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>