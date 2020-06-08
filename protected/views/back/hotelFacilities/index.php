<?php
$this->breadcrumbs=array(
	'Hotel Facilities',
);

$this->menu=array(
	array('label'=>'Create HotelFacility','url'=>array('create')),
	array('label'=>'Manage HotelFacility','url'=>array('admin')),
);
?>

<h1>Hotel Facilities</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
