<?php
$this->breadcrumbs=array(
	'Testimonials'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	__('Update'),
);

$this->menu=array(
array('label'=>'List Testimonial','url'=>array('index')),
array('label'=>'Create Testimonial','url'=>array('create')),
array('label'=>'View Testimonial','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage Testimonial','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> Testimonial <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>