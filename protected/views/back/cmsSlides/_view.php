<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cms_media_id')); ?>:</b>
	<?php echo CHtml::encode($data->cms_media_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cms_slider_id')); ?>:</b>
	<?php echo CHtml::encode($data->cms_slider_id); ?>
	<br />


</div>