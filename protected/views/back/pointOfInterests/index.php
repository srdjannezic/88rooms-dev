<?php
$this->breadcrumbs=array(
	'Point Of Interests',
);

$this->menu=array(
	array('label'=>'Create PointOfInterest','url'=>array('create')),
	array('label'=>'Manage PointOfInterest','url'=>array('admin')),
);
?>

<h1>Point Of Interests</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
