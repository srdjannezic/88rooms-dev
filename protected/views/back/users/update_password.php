<?php
$this->breadcrumbs = array(
    __('Korisnici') => array('index'),
    $model->id => array('view', 'id' => $model->id),
    __('Izmena šifre'),
);
?>

<h1><?php echo __('Izmena šifre'); ?></h1>
<hr/>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>
<?php if (Yii::app()->user->hasFlash('success')) { ?>
    <div class="alert in alert-block fade alert-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php } ?>
<?php echo $form->passwordFieldRow($model, 'new_password', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->passwordFieldRow($model, 'new_password_repeat', array('class' => 'span5', 'maxlength' => 255)); ?>
<div class="clearfix"></div>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => __('Zapamti'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>