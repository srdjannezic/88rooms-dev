<?php
$this->breadcrumbs=array(
	'Cms Galleries',
);

$this->menu=array(
	array('label'=>'Create CmsGallery','url'=>array('create')),
	array('label'=>'Manage CmsGallery','url'=>array('admin')),
);
?>

<h1>Cms Galleries</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
