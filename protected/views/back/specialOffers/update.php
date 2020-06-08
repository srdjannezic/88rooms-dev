<?php
$this->breadcrumbs=array(
	'Special Offers'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	__('Update'),
);

$this->menu=array(
array('label'=>'List SpecialOffer','url'=>array('index')),
array('label'=>'Create SpecialOffer','url'=>array('create')),
array('label'=>'View SpecialOffer','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage SpecialOffer','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> Best Offer <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>