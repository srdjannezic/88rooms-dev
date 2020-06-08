<?php
$this->breadcrumbs=array(
    __('Korisnici')=>array('admin'),
	__('Kreiraj'),
);

$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h1><?php echo __('Kreiraj korisnika');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>