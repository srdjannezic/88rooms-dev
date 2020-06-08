<?php
$this->breadcrumbs=array(
	'Translations'=>array('index'),
	__('Create'),
);

$this->menu=array(
array('label'=>'List Translation','url'=>array('index')),
array('label'=>'Manage Translation','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> Translation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>