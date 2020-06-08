<?php

$this->breadcrumbs = array(
    'Hrana' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    __('Izmeni'),
);

$this->menu = array(
    array('label' => 'List Food', 'url' => array('index')),
    array('label' => 'Create Food', 'url' => array('create')),
    array('label' => 'View Food', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Food', 'url' => array('admin')),
);
?>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>