<?php $gallery = ($gallery_id) ? array("gallery_id" => $gallery_id) : array("gallery_id" => NULL); ?>
<form action="<?php echo Utility::createUrl("ajax/mediaCreate", $gallery); ?>" class="dropzone" id="my-awesome-dropzone">
    <div class="fallback">
        <input name="file" type="file" multiple /> 
    </div>
</form>