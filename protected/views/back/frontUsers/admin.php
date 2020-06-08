<?php
$this->breadcrumbs = array(
    'Front Users' => array('index'),
    __('Manager'),
);

$this->menu = array(
    array('label' => 'List FrontUser', 'url' => array('index')),
    array('label' => 'Create FrontUser', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('front-user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Front Users</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'front-user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'first_name',
        'last_name',
        'address',
        'city',
        'zip_code',
        /*
          'email',
          'phone',
          'username',
          'password',
          'status',
          'activation_code',
          'receive_all_mails',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
