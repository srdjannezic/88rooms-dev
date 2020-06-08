<?php
$this->breadcrumbs=array(
	'Foods',
);

$this->menu=array(
	array('label'=>'Create Food','url'=>array('create')),
	array('label'=>'Manage Food','url'=>array('admin')),
);
?>

<h1>Foods</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
