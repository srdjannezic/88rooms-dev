<?php
$this->breadcrumbs=array(
	'Cms Blocks',
);

$this->menu=array(
	array('label'=>'Create CmsBlock','url'=>array('create')),
	array('label'=>'Manage CmsBlock','url'=>array('admin')),
);
?>

<h1>Cms Blocks</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
