<?php
$this->breadcrumbs=array(
	'Testimonials'=>array('index'),
	__('Create'),
);

$this->menu=array(
array('label'=>'List Testimonial','url'=>array('index')),
array('label'=>'Manage Testimonial','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> Testimonial</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>