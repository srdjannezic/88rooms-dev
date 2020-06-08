<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'testimonial-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block"><?php echo sprintf(__('Fields with %s are required.'),'<span class=\'required\'>*</span>');?></p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'text',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'author',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
