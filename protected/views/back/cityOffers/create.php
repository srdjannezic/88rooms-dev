<?php
$this->breadcrumbs=array(
	'City Offers'=>array('index'),
	__('Kreiraj'),
);

$this->menu=array(
array('label'=>'List CityOffer','url'=>array('index')),
array('label'=>'Manage CityOffer','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> CityOffer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>