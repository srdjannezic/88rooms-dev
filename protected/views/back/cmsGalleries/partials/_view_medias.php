<div class="span2 media-thumbnail" style="margin-left:0px;margin-right: 10px;margin-bottom:15px;">
    <a href="#" data-id="<?php echo $data->cmsMedia->id; ?>">
        <img width="100%" src="<?php echo $data->cmsMedia->_thumb_url; ?>" />
    </a>
    <a href="#" onclick="removeGalleryItem(this)" class="remove" style="display: block;" data-id="<?php echo $data->id; ?>">Remove</a>
    <br/>
</div>
