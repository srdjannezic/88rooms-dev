<?php
$this->breadcrumbs = array(
    'Cms Blocks' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List CmsBlock', 'url' => array('index')),
    array('label' => 'Create CmsBlock', 'url' => array('create')),
    array('label' => 'Update CmsBlock', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete CmsBlock', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage CmsBlock', 'url' => array('admin')),
);
?>

<h1>View CmsBlock #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
    ),
));
?>


<div class="boxes">
    <?php
    $this->widget('ext.yiisortablemodel.widgets.SortableCGridView', array(
        'orderField' => 'ordr',
        'relation_field' => 'cms_block_id',
        'relation_field_value' => $model->id,
        'orderUrl' => 'cmsBoxes/order',
        'id' => 'boxes-list',
        'dataProvider' => $boxes,
        'columns' => array(
            'id',
            array(
                'name' => 'cms_object_id',
                'value' => '$data->cmsBox->cmsObject->title'
            ),
            array(
                'name' => 'title',
                'value' => '$data->cmsBox->title'
            ),
            array(
                'name' => 'text',
                'value' => '$data->cmsBox->text'
            ),
            array(
                'name' => 'btn_text',
                'value' => '$data->cmsBox->btn_text'
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{update} {delete}',
                'buttons' => array(
                    'delete' => array(
                        'url' => 'CController::createUrl("/cmsBlocks/deleteBox", array("id"=>$data->id))'
                    ),
                    'update' => array(
                        'url' => 'CController::createUrl("/cmsBoxes/update", array("id"=>$data->cms_box_id))'
                    )
                )
            ),
        ),
    ));
    ?>
</div>