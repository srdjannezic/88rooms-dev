<?php
$this->breadcrumbs=array(
	'Cms Slides'=>array('index'),
	__('Create'),
);

$this->menu=array(
array('label'=>'List CmsSlide','url'=>array('index')),
array('label'=>'Manage CmsSlide','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> CmsSlide</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>