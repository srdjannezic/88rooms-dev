<?php
$this->breadcrumbs = array(
    __('Update'),
);
?>
<h1><?php echo __('Update'); ?> <?php echo __('a'); ?> slider box #<?php echo $model->id; ?></h1>
<hr/>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>