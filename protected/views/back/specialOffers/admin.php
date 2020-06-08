<?php
$this->breadcrumbs = array(
    'Special Offers' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List SpecialOffer', 'url' => array('index')),
    array('label' => 'Create SpecialOffer', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('special-offer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Best Offers</h1>

<div id="actionBar" class="well">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create',
        'icon' => 'plus',
        'type' => 'primary',
        'size' => 'large',
        'url' => Utility::createUrl("specialOffers/create")
    ));
    ?>
</div>

<?php
$this->widget('ext.yiisortablemodel.widgets.SortableCGridView', array(
    'type' => 'striped condensed',
    'orderField' => 'ordr',
    'orderUrl' => 'specialOffers/order',
    'id' => 'special-offers-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'title',
        'slug',
        'text',
        'date',
        'minimum_stay',
        'ordr',
        array(
            "name" => 'visible',
            'value' => '($data->visible) ? "Yes" : "No"',
            'filter' => array("1" => "Yes", "0" => "No")
        ),
        /*
          'price_from',
          'active_for',
          'hotel_room_id',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',
        ),
    ),
));
?>
