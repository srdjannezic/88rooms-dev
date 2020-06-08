<?php
$this->breadcrumbs = array(
    'Cms Slides' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List CmsSlide', 'url' => array('index')),
    array('label' => 'Create CmsSlide', 'url' => array('create')),
    array('label' => 'Update CmsSlide', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete CmsSlide', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage CmsSlide', 'url' => array('admin')),
);
?>

<h1>View CmsSlide #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'cms_media_id',
        'cms_slider_id',
    ),
));
?>
