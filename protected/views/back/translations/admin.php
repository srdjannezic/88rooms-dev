<?php
$this->breadcrumbs = array(
    'Translations' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List Translation', 'url' => array('index')),
    array('label' => 'Create Translation', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('translation-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Translations</h1>
<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("translations/create")
    ));
    ?>
</div>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'translation-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'key',
        'word',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
