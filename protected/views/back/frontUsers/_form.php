<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'front-user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block"><?php echo sprintf(__('Polja sa %s su obavezna.'),'<span class=\'required\'>*</span>');?></p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'zip_code',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'activation_code',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'receive_all_mails',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
