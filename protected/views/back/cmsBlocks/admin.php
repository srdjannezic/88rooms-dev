<?php
$this->breadcrumbs = array(
    'Cms Blocks' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List CmsBlock', 'url' => array('index')),
    array('label' => 'Create CmsBlock', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cms-block-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cms Blocks</h1>
<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("cmsBlocks/create")
    ));
    ?>
</div>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cms-block-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update} {delete}',
        ),
    ),
));
?>
