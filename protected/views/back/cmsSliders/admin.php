<?php
$this->breadcrumbs=array(
	'Cms Sliders'=>array('index'),
	__('Manager'),
);

$this->menu=array(
	array('label'=>'List CmsSlider','url'=>array('index')),
	array('label'=>'Create CmsSlider','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cms-slider-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cms Sliders</h1>

<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("cmsSliders/create")
    ));
    ?>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cms-slider-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
