<?php
$this->breadcrumbs=array(
	'Cms Sliders'=>array('index'),
	__('Create'),
);

$this->menu=array(
array('label'=>'List CmsSlider','url'=>array('index')),
array('label'=>'Manage CmsSlider','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> CmsSlider</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>