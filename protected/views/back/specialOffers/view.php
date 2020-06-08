<?php
$this->breadcrumbs=array(
	'Special Offers'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List SpecialOffer','url'=>array('index')),
	array('label'=>'Create SpecialOffer','url'=>array('create')),
	array('label'=>'Update SpecialOffer','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete SpecialOffer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SpecialOffer','url'=>array('admin')),
);
?>

<h1>View SpecialOffer #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'slug',
		'text',
		'date',
		'minimum_stay',
		'price_from',
		'active_for',
		'hotel_room_id',
	),
)); ?>
