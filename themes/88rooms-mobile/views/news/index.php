<div class="archive-wrap">
    <div class="title">
        <h1><?php echo __('News'); ?></h1>
    </div>
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'template' => "{items}\n{pager}",
        'itemView' => '_view',
        'htmlOptions' => array(
            'class' => 'archive'
        )
    ));
    ?>
</div>