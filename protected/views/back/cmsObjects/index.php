<?php
$this->breadcrumbs=array(
	'Cms Objects',
);

$this->menu=array(
	array('label'=>'Create CmsObject','url'=>array('create')),
	array('label'=>'Manage CmsObject','url'=>array('admin')),
);
?>

<h1>Cms Objects</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
