<?php
$this->breadcrumbs=array(
	'Point Of Interests'=>array('index'),
	__('Kreiraj'),
);

$this->menu=array(
array('label'=>'List PointOfInterest','url'=>array('index')),
array('label'=>'Manage PointOfInterest','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> PointOfInterest</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>