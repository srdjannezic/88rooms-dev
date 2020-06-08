<?php
$this->breadcrumbs=array(
	'Menu Items',
);

$this->menu=array(
	array('label'=>'Create MenuItem','url'=>array('create')),
	array('label'=>'Manage MenuItem','url'=>array('admin')),
);
?>

<h1>Menu Items</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
