<?php
$this->breadcrumbs=array(
	'Special Offers',
);

$this->menu=array(
	array('label'=>'Create SpecialOffer','url'=>array('create')),
	array('label'=>'Manage SpecialOffer','url'=>array('admin')),
);
?>

<h1>Special Offers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
