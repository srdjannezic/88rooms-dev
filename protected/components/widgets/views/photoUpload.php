<div style="text-align: center;background-color:#EEEEEE;" class="pill ">
<?php
$model = $this->model;
$field = $this->field;
$this->widget("Photo", array('url' => '/files/photo', 'id' => $this->id, 'model' => $this->model, 'field' => $this->field, 'h' => '100', "w" => "100"));
?>
<?php
$this->widget('ext.EAjaxUpload.EAjaxUpload', array(
    'id' => 'uploadFile',
    'config' => array(
        'action' => Utility::createUrl('/files/uploadPhoto',array('id' =>$this->id,'model' => $this->model, 'field' =>$this->field)),
        'allowedExtensions' => array("jpg", "jpeg", "png"), //array("jpg","jpeg","gif","exe","mov" and etc...
        'sizeLimit' => 3 * 1024 * 1024, // maximum file size in bytes
        'onComplete' => "js:function(id, fileName, responseJSON){ reloadPhoto($this->id); }",
    )
));
if(isset($model->{$field})){
    $display = 'display:none';
}
?>
<a type="button" style="<?php echo $display; ?>" href="#" class="btn icon trash delete-photo" data-image-id="<?php echo $this->id; ?>" onclick="return deletePhoto(<?php echo $this->id; ?>, '<?php
echo Yii::app()->createUrl("/files/deletePhoto", array("id" => $this->id, "model" => $this->model, "field" => $this->field))
?>')" <?php
   if (empty($this->field)) {
       echo "style='display:none'";
   }
?> ><i class="icon-trash"></i> &nbsp;<?php echo __('Delete photo');?></a>
<div style="clear:both"></div>
<br/>
</div>