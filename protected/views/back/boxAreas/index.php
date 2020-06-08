<?php
$this->breadcrumbs=array(
	'Box Areas',
);

$this->menu=array(
	array('label'=>'Create BoxArea','url'=>array('create')),
	array('label'=>'Manage BoxArea','url'=>array('admin')),
);
?>

<h1>Box Areas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
