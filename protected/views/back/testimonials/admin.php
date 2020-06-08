<?php
$this->breadcrumbs = array(
    'Testimonials' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List Testimonial', 'url' => array('index')),
    array('label' => 'Create Testimonial', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('testimonial-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Testimonials</h1>
<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("testimonials/create")
    ));
    ?>
</div>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'testimonial-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'title',
        'text',
        'author',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',            
        ),
    ),
));
?>
