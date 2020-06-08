<?php
$this->breadcrumbs=array(
	'Cms Categories',
);

$this->menu=array(
	array('label'=>'Create CmsCategory','url'=>array('create')),
	array('label'=>'Manage CmsCategory','url'=>array('admin')),
);
?>

<h1>Cms Categories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
