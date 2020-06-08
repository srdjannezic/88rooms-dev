<?php
$this->breadcrumbs = array(
    'Cms Galleries' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List CmsGallery', 'url' => array('index')),
    array('label' => 'Create CmsGallery', 'url' => array('create')),
    array('label' => 'Update CmsGallery', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete CmsGallery', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage CmsGallery', 'url' => array('admin')),
);
?>

<h1>Gallery #<?php echo $model->id; ?> <?php echo $model->name; ?></h1>


<?php
$this->widget('MediaModal', array(
    "type" => "grid",
    "updateCont" => "galleryItems",
    "url" => Utility::createUrl("ajax/addGalleryItem", array("id" => $model->id))
        )
);
?>
<div class="content-reload" data-reloadUrl="<?php echo Utility::createUrl("cmsGalleries/view", array("id" => $model->id)); ?>">
    <?php
    $this->widget('ext.yiisortablemodel.widgets.SortableCGridView', array(
        'type' => 'striped condensed',
        'dataProvider' => $medias,
        'orderField' => 'ordr',
        'relation_field' => 'cms_gallery_id',
        'relation_field_value' => $model->id,
        'orderUrl' => 'cmsGalleryItems/order',
        'id' => 'galleryItems',
        'columns' => array(
            'id',
            array(
                'name' => 'cms_media_id',
                'value' => '"<img width=\'50px\' src=\'".((substr($data->cmsMedia->media_type, 0, 5) == "video") ? $data->cmsMedia->_thumb_url : $data->cmsMedia->_thumb_url)."\' />"',
                'type' => 'raw'
            ),
            array(
                'name' => 'title',
                'value' => '$data->cmsMedia->title'
            ),
            array(
                'name' => 'media_type',
                'value' => '$data->cmsMedia->media_type'
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{delete}',
                'buttons' => array(
                    'delete' => array(
                        'url' => 'CController::createUrl("/cmsGalleries/removeGalleryItem", array("id"=>$data->id))'
                    )
                )
            ),
        ),
    ));
    ?>
</div>