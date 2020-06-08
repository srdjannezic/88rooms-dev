<?php
$this->breadcrumbs = array(
    'Cms Medias',
);

$this->menu = array(
    array('label' => 'Create CmsMedia', 'url' => array('create')),
    array('label' => 'Manage CmsMedia', 'url' => array('admin')),
);
?>

<h1>Cms Medias</h1>
<?php echo $this->renderPartial("/general/partials/_upload"); ?>
<?php
$this->widget('MediaModal', array(
    "type" => "grid",
    "updateCont" => "mediaItems",
        //"url" => Utility::createUrl("ajax/addGalleryItem", array("id" => $model->id))
        )
);
?>
<div class="content-reload" data-reloadUrl="<?php echo Utility::createUrl("cmsMedias"); ?>">
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider' => $dataProvider,
        'id' => 'mediaItems',
        'columns' => array(
            'id',
            array(
                'name' => 'cms_media_id',
                'value' => '"<img width=\'50px\' src=\'".((substr($data->media_type, 0, 5) == "video") ? $data->_thumb_url : $data->_thumb_url)."\' />"',
                'type' => 'raw'
            ),
            array(
                'name' => 'title',
                'value' => '$data->title'
            ),
            array(
                'name' => 'media_type',
                'value' => '$data->media_type'
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{delete}',
            ),
        ),
    ));
    ?>
</div>