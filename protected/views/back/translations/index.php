<?php
$this->breadcrumbs=array(
	'Translations',
);

$this->menu=array(
	array('label'=>'Create Translation','url'=>array('create')),
	array('label'=>'Manage Translation','url'=>array('admin')),
);
?>

<h1>Translations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
