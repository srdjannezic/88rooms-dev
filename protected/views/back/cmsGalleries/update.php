<?php
$this->breadcrumbs = array(
    'Cms Galleries' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    __('Izmeni'),
);

$this->menu = array(
    array('label' => 'List CmsGallery', 'url' => array('index')),
    array('label' => 'Create CmsGallery', 'url' => array('create')),
    array('label' => 'View CmsGallery', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage CmsGallery', 'url' => array('admin')),
);
?>
<h1><?php echo __('Update'); ?> <?php echo __('a'); ?> CmsGallery <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>