<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>300)); ?>

	<?php echo $form->textFieldRow($model,'carbonHydrate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fat',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'proteins',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'callories',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'foodCategoryId',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
