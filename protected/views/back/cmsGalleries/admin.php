<?php
$this->breadcrumbs = array(
    'Cms Galleries' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List CmsGallery', 'url' => array('index')),
    array('label' => 'Create CmsGallery', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cms-gallery-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cms Galleries</h1>

<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("cmsGalleries/create")
    ));
    ?>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cms-gallery-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
