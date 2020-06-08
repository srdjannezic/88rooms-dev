<div class="view">
    <div class="thumbnail">
        <a href="<?php echo Utility::createUrl('profile/profileAdDetail', array("id" => $data->id)); ?>" title="<?php echo $data->title; ?>">            
            <img src="<?php echo $data->_feature_image_th; ?>" />
        </a>
    </div>
    <div class="info">
        <h2 class="title-small">            
            <?php echo CHtml::link($data->start->name . " - " . $data->end->name, array('site/ad', "id" => $data->id)); ?>            
        </h2> 
        <span class="small"><?php echo $data->title; ?></span>
        <span class="priceBig">            
            <?php echo CHtml::encode($data->price); ?> <?php echo __('RSD'); ?>
        </span>        
        <div class="span-mini-box">
            <b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
            <?php echo CHtml::encode($data->weight); ?>
            <br />
            <b><?php echo CHtml::encode($data->getAttributeLabel('dimensions')); ?>:</b><br/>
            <?php echo CHtml::encode($data->dimensions); ?>
        </div>
        <div class="span-mini-box">
            <b><?php echo CHtml::encode($data->getAttributeLabel('deadline')); ?>:</b>
            <?php echo CHtml::encode($data->deadline); ?>
            <br />
            <b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b><br/>
            <?php echo CHtml::encode($data->date_created); ?>
        </div>
        <div class="span-mini-box rightAlign right">
            <div class="btn-group" id="control-btns">
                <a href="<?php echo Utility::createUrl('profile/profileAdDetail', array("id" => $data->id)); ?>" class="btn" title="<?php echo $data->title; ?>"><i class="icon-eye-open"></i> <?php echo __('Detaljnije'); ?></a>
                <a href="<?php echo Utility::createUrl('profile/profileAdUpdate', array("id" => $data->id)); ?>" class="btn" title="<?php echo $data->title; ?>"><i class="icon-pencil"></i> <?php echo __('Izmeni'); ?></a>
            </div>
        </div>        
        <div class="clearfix"></div>
    </div>
</div>
<div class="clearfix"></div>