<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'login-form',
    'type' => 'vertical',
    'enableClientValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'login-form'
    ),
        ));
?>
<h3 class="form-title">Login to your account</h3>
<?php echo $form->textFieldRow($model, 'username', array("class" => "input-xlarge")); ?>
<?php echo $form->passwordFieldRow($model, 'password', array("class" => "input-xlarge")); ?>
<div class="form-actions">
    <?php echo $form->checkBoxRow($model, 'rememberMe'); ?>
    <button type="submit" class="btn green pull-right">
        Login <i class="m-icon-swapright m-icon-white"></i>
    </button>            
</div>
<?php $this->endWidget(); ?>