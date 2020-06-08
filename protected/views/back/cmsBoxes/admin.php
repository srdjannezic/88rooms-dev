<?php
$this->breadcrumbs = array(
    'Cms Boxes' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List CmsBox', 'url' => array('index')),
    array('label' => 'Create CmsBox', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cms-box-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cms Boxes</h1>

<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("cmsBoxes/create")
    ));
    ?>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cms-box-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'title',
        'cms_object_id',
        'text',
        'btn_text',
        'url',
        'cms_media_id',
        'cms_block_id',
        /*
          'cms_block_id',
          'title',
          'ordr',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',            
        ),
    ),
));
?>
