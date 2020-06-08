<?php
$this->breadcrumbs=array(
	'City Offers'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	__('Izmeni'),
);

$this->menu=array(
array('label'=>'List CityOffer','url'=>array('index')),
array('label'=>'Create CityOffer','url'=>array('create')),
array('label'=>'View CityOffer','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage CityOffer','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> CityOffer <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>