<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_facilities_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_facilities_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordr')); ?>:</b>
	<?php echo CHtml::encode($data->ordr); ?>
	<br />


</div>