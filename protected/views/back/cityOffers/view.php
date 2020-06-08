<?php
$this->breadcrumbs=array(
	'City Offers'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CityOffer','url'=>array('index')),
	array('label'=>'Create CityOffer','url'=>array('create')),
	array('label'=>'Update CityOffer','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete CityOffer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CityOffer','url'=>array('admin')),
);
?>

<h1>View CityOffer #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'text',
		'date',
		'slug',
		'point_of_interest_id',
	),
)); ?>
