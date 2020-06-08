<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model, 'first_name', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'last_name', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'telephone', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php if (!$model->isNewRecord) { ?>  
    <?php echo $form->passwordFieldRow($model, 'new_password', array('class' => 'span5', 'maxlength' => 255)); ?>
    <?php echo $form->passwordFieldRow($model, 'new_password_repeat', array('class' => 'span5', 'maxlength' => 255)); ?>        
<?php } else { ?>
    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span5', 'maxlength' => 255)); ?>
    <?php echo $form->passwordFieldRow($model, 'password_repeat', array('class' => 'span5', 'maxlength' => 255)); ?>        
<?php } ?>
<?php if (!$model->isNewRecord) { ?>            
    <table class="roles table table-striped">
        <?php
        foreach ($model->assignments as $a) {
            echo $this->renderPartial('partials/form/role_li', array(
                'user' => $model,
                'assignment' => $a,
            ));
        }
        ?>
    </table>
    <?php
    echo $this->renderPartial('partials/form/role_select', array(
        'user' => $model,
        "form" => $form
    ));
    ?>
<?php } ?>    
<div class="clearfix"></div>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? __('Create') : __('Save'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>