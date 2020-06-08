<?php
$this->breadcrumbs = array(
    'Point Of Interests' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    __('Izmeni'),
);

$this->menu = array(
    array('label' => 'List PointOfInterest', 'url' => array('index')),
    array('label' => 'Create PointOfInterest', 'url' => array('create')),
    array('label' => 'View PointOfInterest', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage PointOfInterest', 'url' => array('admin')),
);
?>
<h1><?php echo __('Update'); ?> <?php echo __('a'); ?> PointOfInterest <?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>