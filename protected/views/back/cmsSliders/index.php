<?php
$this->breadcrumbs = array(
    'Cms Sliders',
);

$this->menu = array(
    array('label' => 'Create CmsSlider', 'url' => array('create')),
    array('label' => 'Manage CmsSlider', 'url' => array('admin')),
);
?>

<h1>Cms Sliders</h1>

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'enableSorting' => true
));
?>
