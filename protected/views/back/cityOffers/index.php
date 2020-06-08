<?php
$this->breadcrumbs=array(
	'City Offers',
);

$this->menu=array(
	array('label'=>'Create CityOffer','url'=>array('create')),
	array('label'=>'Manage CityOffer','url'=>array('admin')),
);
?>

<h1>City Offers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
