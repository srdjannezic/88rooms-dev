<h2 class="title-bar light"><?php echo __('Zaboravili ste šifru?'); ?></h1>
<div id="inner-content">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'sign-up-form',        
        'enableAjaxValidation' => false,
            ));
    ?>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span4', 'maxlength' => 255)); ?>
    <div class="form-actions">
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'submit',                    
                    'label' => __('Resetuj šifru'),
                    'type' => '',
                    'htmlOptions' => array('class' => 'btn-blue')
                ));
                ?>
            </div>
    <?php $this->endWidget(); ?>
</div>