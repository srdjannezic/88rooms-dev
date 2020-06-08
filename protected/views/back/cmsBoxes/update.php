<?php
$this->breadcrumbs=array(
	'Cms Boxes'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	__('Update'),
);

$this->menu=array(
array('label'=>'List CmsBox','url'=>array('index')),
array('label'=>'Create CmsBox','url'=>array('create')),
array('label'=>'View CmsBox','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage CmsBox','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> CmsBox <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>