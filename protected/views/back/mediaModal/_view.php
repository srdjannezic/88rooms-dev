<div class="span2 media-thumbnail" style="margin-left:0px;margin-bottom:15px;height: 100px;">
    <a href="#" onclick="addMediaItem(<?php echo $data->id; ?>)" data-id="<?php echo $data->id; ?>">
        <img width="100px" height="100px" src="<?php echo (substr($data->media_type, 0, 5) == 'video') ? $data->_thumb_url : $data->_thumb_url; ?>" />
    </a>
    <br/>
</div>