<div class="archive">
    <div class="title">
        <h1><?php echo __('Hotel location and directions'); ?></h1>
    </div>
    <div class="container_12">
        <?php
        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider' => $dataProvider,
            'template' => "{items}\n{pager}",
            'itemView' => '_view',
        ));
        ?>
    </div>
</div>