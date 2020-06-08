<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slug')); ?>:</b>
	<?php echo CHtml::encode($data->slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minimum_stay')); ?>:</b>
	<?php echo CHtml::encode($data->minimum_stay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_from')); ?>:</b>
	<?php echo CHtml::encode($data->price_from); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('active_for')); ?>:</b>
	<?php echo CHtml::encode($data->active_for); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_room_id')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_room_id); ?>
	<br />

	*/ ?>

</div>