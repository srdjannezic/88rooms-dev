<div class="container_12">
    <?php echo $model->text; ?>
</div>
<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => HotelRoom::model()->visible()->search(),
    'template' => "{items}\n{pager}",
    'itemView' => '//page/templates/partials/_room',
    'htmlOptions' => array(
        'class' => 'archive'
    )
));
?>