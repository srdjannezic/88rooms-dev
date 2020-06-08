<?php
$this->breadcrumbs=array(
	'Cms Galleries'=>array('index'),
	__('Kreiraj'),
);

$this->menu=array(
array('label'=>'List CmsGallery','url'=>array('index')),
array('label'=>'Manage CmsGallery','url'=>array('admin')),
);
?>
<h1><?php echo __('Create');?> <?php echo __('a');?> CmsGallery</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>