<?php
$this->breadcrumbs=array(
	'Cms Boxes',
);

$this->menu=array(
	array('label'=>'Create CmsBox','url'=>array('create')),
	array('label'=>'Manage CmsBox','url'=>array('admin')),
);
?>

<h1>Cms Boxes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
