<?php
$this->breadcrumbs=array(
	'Hotel Facilities Categories',
);

$this->menu=array(
	array('label'=>'Create HotelFacilitiesCategory','url'=>array('create')),
	array('label'=>'Manage HotelFacilitiesCategory','url'=>array('admin')),
);
?>

<h1>Hotel Facilities Categories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
