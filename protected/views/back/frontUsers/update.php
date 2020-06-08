<?php
$this->breadcrumbs=array(
	'Front Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	__('Izmeni'),
);

$this->menu=array(
	array('label'=>'List FrontUser','url'=>array('index')),
	array('label'=>'Create FrontUser','url'=>array('create')),
	array('label'=>'View FrontUser','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage FrontUser','url'=>array('admin')),
);
?>

<h1><?php echo __('Izmeni');?> FrontUser <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>