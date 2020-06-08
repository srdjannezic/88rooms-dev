<?php
$this->breadcrumbs=array(
	'Cms Sliders'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	__('Update'),
);

$this->menu=array(
array('label'=>'List CmsSlider','url'=>array('index')),
array('label'=>'Create CmsSlider','url'=>array('create')),
array('label'=>'View CmsSlider','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage CmsSlider','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> CmsSlider <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>