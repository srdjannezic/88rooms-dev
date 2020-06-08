<?php
$this->breadcrumbs = array(
    'City Offers' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List CityOffer', 'url' => array('index')),
    array('label' => 'Create CityOffer', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('city-offer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage City Offers</h1>

<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("cityOffers/create")
    ));
    ?>
</div>

<?php
$this->widget('ext.yiisortablemodel.widgets.SortableCGridView', array(
    'type' => 'table',
    'orderField' => 'ordr',
    'orderUrl' => 'cityOffers/order',
    'id' => 'city-offer-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'title',
        'slug',
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
