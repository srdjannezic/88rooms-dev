<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carbonHydrate')); ?>:</b>
	<?php echo CHtml::encode($data->carbonHydrate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fat')); ?>:</b>
	<?php echo CHtml::encode($data->fat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proteins')); ?>:</b>
	<?php echo CHtml::encode($data->proteins); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('callories')); ?>:</b>
	<?php echo CHtml::encode($data->callories); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foodCategoryId')); ?>:</b>
	<?php echo CHtml::encode($data->foodCategoryId); ?>
	<br />


</div>