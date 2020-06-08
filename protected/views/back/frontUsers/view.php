<?php

$this->breadcrumbs = array(
    'Front Users' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List FrontUser', 'url' => array('index')),
    array('label' => 'Create FrontUser', 'url' => array('create')),
    array('label' => 'Update FrontUser', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete FrontUser', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage FrontUser', 'url' => array('admin')),
);
?>
<?php

$this->widget("TabView", array(
    'htmlOptions' => array(
        "class" => "bootstrap-tab-view"
    ),
    'tabs' => array(
        'general' => array(
            'title' => __('General info'),
            'view' => 'partials/view/_general',
            'data' => array('model' => $model),
        ),
        'posts' => array(
            'title' => __('User posts'),
            'view' => 'partials/view/_posts',
            'data' => array('model' => $model,"posts" => $posts),
        ),
        'billboards' => array(
            'title' => __('User billboards'),
            'view' => 'partials/view/_billboards',
            'data' => array('model' => $model,"billboards" => $billboards),
        ),
    )
));