<?php
$this->breadcrumbs = array(
    __('Korisnici sistema') => array('admin'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List User', 'url' => array('index')),
    array('label' => 'Create User', 'url' => array('create')),
    array('label' => 'Update User', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete User', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage User', 'url' => array('admin')),
);
?>

<h1><?php echo sprintf(__('Korisnik #%s'), $model->id); ?></h1>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'username',
        'first_name',
        'last_name',
        'email',
        'telephone',
    ),
));
?>
