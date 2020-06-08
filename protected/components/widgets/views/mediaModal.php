<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'media-modal')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Medias</h4>
</div>

<div class="modal-body">
    <?php
    $this->widget("TabView", array(
        'htmlOptions' => array(
            "class" => "bootstrap-tab-view"
        ),
        'tabs' => array(
            'upload' => array(
                'title' => __('Upload'),
                'view' => '//mediaModal/_upload',
            ),
            'images' => array(
                'title' => __('Images'),
                'view' => '//mediaModal/_images',
            ),
            'videos' => array(
                'title' => __('Videos'),
                'view' => '//mediaModal/_videos',
                'data' => array("model" => $model, "updateCont" => $this->updateCont)
            ),
        )
    ));
    ?>        
</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => 'Save changes',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'type' => 'primary',
    'label' => 'Add a media',
    'block' => true,
    'htmlOptions' => array(
        'data-toggle' => 'modal',
        'data-target' => '#media-modal',
    ),
));
?>
<script>
    function addMediaItem(id){
        $.post('<?php echo $this->url; ?>',{"cms_media_id" : id}, function(response){            
            if(!response.error){
<?php if ($this->type == 'grid'): ?>
                    $.fn.yiiGridView.update("<?php echo $this->updateCont; ?>");
<?php endif; ?>
<?php if ($this->type == 'list'): ?>
                    $.fn.yiiListView.update("<?php echo $this->updateCont; ?>");
<?php endif; ?>
            }
        }, 'json')
    }
</script>