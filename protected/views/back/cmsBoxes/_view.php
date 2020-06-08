<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cms_object_id')); ?>:</b>
	<?php echo CHtml::encode($data->cms_object_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('btn_text')); ?>:</b>
	<?php echo CHtml::encode($data->btn_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cms_media_id')); ?>:</b>
	<?php echo CHtml::encode($data->cms_media_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cms_block_id')); ?>:</b>
	<?php echo CHtml::encode($data->cms_block_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordr')); ?>:</b>
	<?php echo CHtml::encode($data->ordr); ?>
	<br />

	*/ ?>

</div>