<?php
$this->breadcrumbs=array(
	'Front Users'=>array('index'),
	__('Kreiraj'),
);

$this->menu=array(
	array('label'=>'List FrontUser','url'=>array('index')),
	array('label'=>'Manage FrontUser','url'=>array('admin')),
);
?>

<h1><?php echo __('Kreiraj');?> FrontUser</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>