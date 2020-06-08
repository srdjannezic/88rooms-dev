<?php
$this->breadcrumbs=array(
	'Special Offers'=>array('index'),
	__('Kreiraj'),
);

$this->menu=array(
array('label'=>'List SpecialOffer','url'=>array('index')),
array('label'=>'Manage SpecialOffer','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> Best Offer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>