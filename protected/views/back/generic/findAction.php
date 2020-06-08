<?php

//$provider = !isset($options['searchArgument']) ? $searchModel->search() : $searchModel->search($options['searchArgument']);
//$id = 'grid-' . $random;

$id = 'grid-'.get_class($searchModel);

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => $id,
    'ajaxUrl'=>$options['url'],
    'afterAjaxUpdate'=>"function(id, data) {refreashSelectBox()}",
    'dataProvider' => $searchModel->search(),
    'filter' => $searchModel,
    'columns' => $options['columns']
));