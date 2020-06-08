<h2 class="title-bar light"><?php echo __('Izmena profila'); ?></h2>
<div id="inner-content">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'contact-form',
        'enableAjaxValidation' => false,
            ));
    ?>
    <?php echo $form->errorSummary($model); ?>
    <?php if (Yii::app()->customer->hasFlash('success')) { ?>
        <div class="alert in alert-block fade alert-success">
            <?php echo Yii::app()->customer->getFlash('success'); ?>
        </div>
    <?php } ?>
    <div class="span6-re left">
        <fieldset>
            <legend><?php echo __('Podaci o korisniku'); ?></legend>
            <?php echo $form->passwordFieldRow($model, 'new_password', array('class' => 'span5', 'maxLength' => 255)); ?>
            <?php echo $form->passwordFieldRow($model, 'new_password_repeat', array('class' => 'span5', 'maxLength' => 255)); ?>
        </fieldset>
    </div>
    <div class="span6-re">
        <fieldset>
            <legend><?php echo __('Lični podaci'); ?></legend>
            <?php echo $form->textFieldRow($model, 'first_name', array('class' => 'span5', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldRow($model, 'last_name', array('class' => 'span5', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldRow($model, 'address', array('class' => 'span5', 'maxlength' => 255)); ?>
            <?php echo $form->dropDownListRow($model, 'city', CHtml::listData(City::model()->findAll(), 'id', 'name'), array('class' => 'span5')); ?>
            <?php echo $form->textFieldRow($model, 'zip_code', array('class' => 'span5', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldRow($model, 'contact_phone', array('class' => 'span5', 'maxlength' => 255)); ?>
        </fieldset>
    </div>
    <div class="clearfix"></div>
    <hr />
    <div class="clearfix"></div>
    <div class="span12-re left">
        <fieldset>
            <legend><?php echo __('Podaci o preduzeću'); ?></legend>
            <?php echo $form->textFieldRow($model, 'company_name', array('class' => 'span5', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldRow($model, 'company_pib', array('class' => 'span5')); ?>
        </fieldset>
    </div>
    <div class="clearfix"></div>
    <div class="span6-re left">
        <fieldset>
            <legend><?php echo __('Kontakt'); ?></legend>
            <?php echo $form->textFieldRow($model, 'company_address', array('class' => 'span5', 'maxlength' => 255)); ?>
            <?php echo $form->dropDownListRow($model, 'company_city', CHtml::listData(City::model()->findAll(), 'id', 'name'), array('class' => 'span5', "empty" => "")); ?>
            <?php echo $form->textFieldRow($model, 'company_zip_code', array('class' => 'span5', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldRow($model, 'company_phone', array('class' => 'span5', 'maxlength' => 255)); ?>
        </fieldset>
    </div>
    <?php if (Yii::app()->customer->isCarrier): ?>
        <div class="span6-re">
            <fieldset>
                <legend><?php echo __('Kapacitet vozila kojim raspolažete'); ?></legend>           
                <?php
                echo $form->checkBoxListRow($model, 'capacitiesIds', CHtml::listData(VehicleCapacity::model()->findAll(), 'id', 'name'));
                ?>
            </fieldset>
        </div>
    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'blue',
            'label' => __("Izmeni podatke"),
            'htmlOptions' => array('class' => 'btn-blue'),
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>