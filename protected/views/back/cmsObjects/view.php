<?php
$this->breadcrumbs = array(
    'Cms Objects' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List CmsObject', 'url' => array('index')),
    array('label' => 'Create CmsObject', 'url' => array('create')),
    array('label' => 'Update CmsObject', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete CmsObject', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage CmsObject', 'url' => array('admin')),
);
?>

<h1>View CmsObject #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'title',
        'text',
        'date_created',
        'object_type',
        'cms_media_id',
        'user_id',
        'slug',
        'excerpt',
        array(
            'name' => '_categories',
            'value' => Utility::arrayToCommaSeparated($model->categories, "name")
        )
    ),
));
?>
