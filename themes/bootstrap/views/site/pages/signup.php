<h2 class="title-bar light"><?php echo __('Registruj se'); ?></h1>
<div id="inner-content">    
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'sign-up-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => false,
            ));
    ?>    
    <div class="left">
        <?php echo $form->errorSummary($model); ?>
        <?php echo $form->dropDownListRow($model, 'type_id', CHtml::listData(ContactType::model()->findAll(), 'id', 'name'), array('class' => 'span4', 'hint' => '<span class="alert alert-info span4-re left"><strong>' . __('Napomena') . ':</strong> Špediter mora biti pravno lice!</span>')); ?>
    </div>
    <div class="span6-re left">        
        <fieldset>
            <legend><?php echo __('Podaci o korisniku :'); ?></legend>
            <?php echo $form->textFieldRow($model, 'email', array('class' => 'span4', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldRow($model, 'email_repeat', array('class' => 'span4', 'maxlength' => 255)); ?><br><br>

            <?php echo $form->passwordFieldRow($model, '_password', array('class' => 'span4', 'maxLength' => 255)); ?>
            <?php echo $form->passwordFieldRow($model, 'password_repeat', array('class' => 'span4', 'maxLength' => 255)); ?><br><br>

            <?php echo $form->radioButtonListRow($model, 'receive_all_mails', array(1 => __("Da"), 0 => __("Ne")));?>
        </fieldset>
    </div>
    <div class="span6-re">
        <fieldset>
            <legend><?php echo __('Lični podaci :'); ?></legend>
            <?php echo $form->textFieldRow($model, 'first_name', array('class' => 'span4', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldRow($model, 'last_name', array('class' => 'span4', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldRow($model, 'address', array('class' => 'span4', 'maxlength' => 255)); ?>
            <?php echo $form->dropDownListRow($model, 'city', CHtml::listData(City::model()->findAll(), 'id', 'name'), array('class' => 'span4', "empty" => "")); ?>
            <?php echo $form->textFieldRow($model, 'zip_code', array('class' => 'span4', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldRow($model, 'contact_phone', array('class' => 'span4', 'maxlength' => 255)); ?>
        </fieldset>
    </div>
    <div class="clearfix"></div>
    <hr />
    <div class="clearfix"></div>
    <div class="span12-re left">
        <fieldset>
            <legend><?php echo __('Podaci o preduzeću :'); ?></legend>
            <div class="alert alert-info span4-re offset1-re">
                <strong><?php echo __('Napomena'); ?>:</strong> <?php echo __('Obavezno za špeditere!'); ?>
            </div>
            <div class="clearfix"></div>
            <?php echo $form->textFieldRow($model, 'company_name', array('class' => 'span4', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldRow($model, 'company_pib', array('class' => 'span4')); ?>
        </fieldset>
    </div>
    <div class="clearfix"></div>
    <div class="span6-re left">
        <fieldset>
            <legend><?php echo __('Kontakt :'); ?></legend>
            <div class="alert alert-info span4-re offset1-re">
                <strong><?php echo __('Napomena'); ?>:</strong> <?php echo __('Ako je isti kontakt kao i za ličnu adresu,ova polja možete ostaviti prazna!'); ?>
            </div>
            <div class="clearfix"></div>
            <?php echo $form->checkboxRow($model, '_same_data'); ?>
            <div class="clearfix"></div>
            <?php echo $form->textFieldRow($model, 'company_address', array('class' => 'span4', 'maxlength' => 255)); ?>
            <?php echo $form->dropDownListRow($model, 'company_city', CHtml::listData(City::model()->findAll(), 'id', 'name'), array('class' => 'span4', "empty" => "")); ?>
            <?php echo $form->textFieldRow($model, 'company_zip_code', array('class' => 'span4', 'maxlength' => 255)); ?>
            <?php echo $form->textFieldRow($model, 'company_phone', array('class' => 'span4', 'maxlength' => 255)); ?>
        </fieldset>
    </div>
    <div class="span6-re" style="<?php echo ($model->type_id == 2) ? 'display: block' : 'display:none'; ?>" id="vehicle_capacity">
        <fieldset>
            <legend><?php echo __('Kapacitet vozila kojim raspolažete :'); ?></legend>           
            <?php
            echo $form->checkBoxListRow($model, 'capacitiesIds', CHtml::listData(VehicleCapacity::model()->findAll(), 'id', 'name'));
            ?>
        </fieldset>
    </div>
    <div class="clearfix"></div>
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => __("Registruj se"),
            'type' => 'blue',
            'htmlOptions' => array("class" => "btn-blue")
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>        
</div>
<script>
    $(function(){
        $("select[name='Contact[type_id]']").change(function(){            
            if($(this).val() == 2){
                $("#vehicle_capacity").show();
            }else{
                $("#vehicle_capacity").hide();
            }
        })
    })
</script>