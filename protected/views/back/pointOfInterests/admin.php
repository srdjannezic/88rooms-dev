<?php
$this->breadcrumbs = array(
    'Point Of Interests' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List PointOfInterest', 'url' => array('index')),
    array('label' => 'Create PointOfInterest', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('point-of-interest-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Point Of Interests</h1>

<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("pointOfInterests/create")
    ));
    ?>
</div>

<?php
$this->widget('ext.yiisortablemodel.widgets.SortableCGridView', array(
    'type' => 'table',
    'orderField' => 'ordr',
    'orderUrl' => 'pointOfInterests/order',
    'id' => 'point-of-interest-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        'subtitle',
        'description',
        'ordr',        
        array(
            "name" => 'visible',
            'value' => '($data->visible) ? "Yes" : "No"',
            'filter' => array("1" => "Yes", "0" => "No")
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',
        ),
    ),
));
?>
