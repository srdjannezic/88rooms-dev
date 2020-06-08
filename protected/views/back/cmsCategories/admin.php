<?php
$this->breadcrumbs = array(
    'Cms Categories' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List CmsCategory', 'url' => array('index')),
    array('label' => 'Create CmsCategory', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cms-category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cms Categories</h1>

<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("cmsCategories/create")
    ));
    ?>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cms-category-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        'slug',
        'date_created',        
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',            
        ),
    ),
));
?>
