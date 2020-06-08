<?php
$this->breadcrumbs = array(
    'Hotel Facilities Categories' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List HotelFacilitiesCategory', 'url' => array('index')),
    array('label' => 'Create HotelFacilitiesCategory', 'url' => array('create')),
    array('label' => 'Update HotelFacilitiesCategory', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete HotelFacilitiesCategory', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage HotelFacilitiesCategory', 'url' => array('admin')),
);
?>

<h1>View HotelFacilitiesCategory #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'ordr',
    ),
));
?>
<?php
$this->widget('ext.yiisortablemodel.widgets.SortableCGridView', array(
    'type' => 'striped condensed',
    'orderField' => 'ordr',
    'relation_field' => 'hotel_facilities_category_id',
    'relation_field_value' => $model->id,
    'orderUrl' => 'hotelFacilities/order',
    'id' => 'hotel-facility-grid',
    'dataProvider' => $facilityDataProvider,
    'columns' => array(
        'id',
        'name',
        'ordr',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{delete}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'CController::createUrl("/hotelFacilities/delete", array("id"=>$data->id))'
                )
            )
        ),
    ),
));
?>