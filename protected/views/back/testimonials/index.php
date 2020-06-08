<?php
$this->breadcrumbs=array(
	'Testimonials',
);

$this->menu=array(
	array('label'=>'Create Testimonial','url'=>array('create')),
	array('label'=>'Manage Testimonial','url'=>array('admin')),
);
?>

<h1>Testimonials</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
