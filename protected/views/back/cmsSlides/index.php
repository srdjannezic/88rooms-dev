<?php
$this->breadcrumbs=array(
	'Cms Slides',
);

$this->menu=array(
	array('label'=>'Create CmsSlide','url'=>array('create')),
	array('label'=>'Manage CmsSlide','url'=>array('admin')),
);
?>

<h1>Cms Slides</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
