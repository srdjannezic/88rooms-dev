<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>



<div id="login_form_wrapper">
    <h1><?php echo __('Dobrodošli'); ?></h1>
    <div  class="form well">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'login-form',
            'type' => 'vertical',
            'enableClientValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
                ));
        ?>
        <?php echo $form->textFieldRow($model, 'username', array("class" => "input-xlarge")); ?>
        <?php echo $form->passwordFieldRow($model, 'password', array("class" => "input-xlarge")); ?>
        <?php echo $form->checkBoxRow($model, 'rememberMe'); ?>

        <div class="form-actions">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => 'Login',
            ));
            ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->
