<?php
$this->breadcrumbs=array(
	'Front Users',
);

$this->menu=array(
	array('label'=>'Create FrontUser','url'=>array('create')),
	array('label'=>'Manage FrontUser','url'=>array('admin')),
);
?>

<h1>Front Users</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
