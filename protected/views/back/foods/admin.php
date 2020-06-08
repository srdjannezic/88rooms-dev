<?php
$this->breadcrumbs=array(
	'Foods'=>array('index'),
	__('Menadžer'),
);

$this->menu=array(
	array('label'=>'List Food','url'=>array('index')),
	array('label'=>'Create Food','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('food-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'food-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'carbonHydrate',
		'fat',
		'proteins',
		'callories',
		/*
		'foodCategoryId',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
