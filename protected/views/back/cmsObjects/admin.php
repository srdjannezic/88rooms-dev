<?php
$this->breadcrumbs = array(
    'Cms Objects' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List CmsObject', 'url' => array('index')),
    array('label' => 'Create CmsObject', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cms-object-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cms Objects</h1>
<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("cmsObjects/create", array("type" => $_GET['type']))
    ));
    ?>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cms-object-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
    'columns' => array(
        'id',
        'title',
        'excerpt',
        'date_created',
        'object_type',
        array(
            "name" => 'visible',
            'value' => '($data->visible) ? "Yes" : "No"',
            'filter' => array("1" => "Yes", "0" => "No")
        ),
        /*
          'user_id',
          'slug',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',
            'buttons' => array(
                'delete' => array(
                    "visible" => '!$data->is_home'
                )
            )
        ),
    ),
));
?>
