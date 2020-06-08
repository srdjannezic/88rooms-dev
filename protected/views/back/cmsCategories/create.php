<?php
$this->breadcrumbs=array(
	'Cms Categories'=>array('index'),
	__('Kreiraj'),
);

$this->menu=array(
array('label'=>'List CmsCategory','url'=>array('index')),
array('label'=>'Manage CmsCategory','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> CmsCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>