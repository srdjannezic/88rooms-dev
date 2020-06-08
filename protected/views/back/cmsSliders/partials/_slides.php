<div class="slide-sortable ui-sortable-handle" id="media_<?php echo $model->cmsMedia->id; ?>">
    <input type='hidden' id='hidden_<?php echo $model->id; ?>' name="CmsSlide[<?php echo $i;?>][cms_media_id]" value='<?php echo $model->cmsMedia->id; ?>'>
    <input type='hidden' id='hidden_<?php echo $model->id; ?>' name="CmsSlide[<?php echo $i;?>][slide_id]" value='<?php echo $model->id; ?>'>
    <input type='hidden' id='hidden_<?php echo $model->id; ?>' name='SlidesIds[]' value='<?php echo $model->id; ?>'>
    <a href="#" onclick="removeSlide(<?php echo $model->cmsMedia->id; ?>)" class="removeMenuItem">Remove</a>    
    <h3>
        <img src="<?php echo $model->cmsMedia->_thumb_url; ?>" />
    </h3>
</div>