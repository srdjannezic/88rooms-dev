<?php
$this->breadcrumbs=array(
	'Cms Slides'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	__('Update'),
);

$this->menu=array(
array('label'=>'List CmsSlide','url'=>array('index')),
array('label'=>'Create CmsSlide','url'=>array('create')),
array('label'=>'View CmsSlide','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage CmsSlide','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> CmsSlide <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>