<?php
$this->breadcrumbs = array(    
    __('Configuration'),
);

$this->menu = array(
    array('label' => 'List Configuration', 'url' => array('index')),
    array('label' => 'Create Configuration', 'url' => array('create')),
    array('label' => 'View Configuration', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Configuration', 'url' => array('admin')),
);
?>
<h1>Configuration</h1>
<hr/>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>