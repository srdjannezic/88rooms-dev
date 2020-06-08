<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'media-modal')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
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
                'view' => '/general/partials/_upload',
            ),
            'images' => array(
                'title' => __('Images'),
                'view' => '/general/partials/_images',
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