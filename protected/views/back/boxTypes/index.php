<?php
$this->breadcrumbs=array(
	'Box Types',
);

$this->menu=array(
	array('label'=>'Create BoxType','url'=>array('create')),
	array('label'=>'Manage BoxType','url'=>array('admin')),
);
?>

<h1>Box Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
