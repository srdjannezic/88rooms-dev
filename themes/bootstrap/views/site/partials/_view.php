<div class="view">
    <div class="thumbnail span2-re left right">
        <a href="<?php echo Utility::createUrl('site/ad', array("id" => $data->id)); ?>" title="<?php echo $data->title; ?>">            
            <img src="<?php echo $data->_feature_image_th; ?>" />
        </a>
    </div>
    <div class="info span5-re">
        <div class="span3-re left">
            <h2 class="title-small">            
                <?php echo CHtml::link($data->start->name . " - " . $data->end->name, array('site/ad', "id" => $data->id)); ?>            
            </h2>
            <span class="small"><?php echo $data->title; ?></span>
        </div>
        <div class="span2-re">
            <span class="priceBig">            
                <?php echo CHtml::encode($data->price); ?> <?php echo __('RSD'); ?>
            </span>        
        </div>
        <div class="clearfix"></div>        
        <div class="span-mini-box">
            <b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
            <?php echo CHtml::encode($data->weight)."kg"; ?>
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
            <a href="<?php echo Utility::createUrl('site/ad', array("id" => $data->id)); ?>" class="btn btn-blue more" title="<?php echo $data->title; ?>"><?php echo __('Detaljnije'); ?></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="clearfix"></div>
<hr/>