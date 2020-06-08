<?php
$this->breadcrumbs=array(
	'Cms Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	__('Izmeni'),
);

$this->menu=array(
array('label'=>'List CmsCategory','url'=>array('index')),
array('label'=>'Create CmsCategory','url'=>array('create')),
array('label'=>'View CmsCategory','url'=>array('view','id'=>$model->id)),
array('label'=>'Manage CmsCategory','url'=>array('admin')),
);
?>
<h1><?php echo __('Update');?> <?php echo __('a');?> Category <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>