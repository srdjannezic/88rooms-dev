<?php
$this->breadcrumbs=array(
	'Hotel Rooms',
);

$this->menu=array(
	array('label'=>'Create HotelRoom','url'=>array('create')),
	array('label'=>'Manage HotelRoom','url'=>array('admin')),
);
?>

<h1>Hotel Rooms</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
