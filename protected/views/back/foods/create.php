<?php
$this->breadcrumbs=array(
	'Foods'=>array('index'),
	__('Kreiraj'),
);

$this->menu=array(
	array('label'=>'List Food','url'=>array('index')),
	array('label'=>'Manage Food','url'=>array('admin')),
);
?>

<h1><?php echo __('Kreiraj');?> Food</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>