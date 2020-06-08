<?php
$this->pageTitle = Yii::app()->name;
?>
<h2 class="title-bar light"><?php echo __("Oglasi koje pratite"); ?></h2>
<div id="inner-content" class="bg-white">
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'sortableAttributes' => array(
            'date'
        ),
        'dataProvider' => $dataProvider,
        'itemView' => 'carrier/partials/_view_ad_following',
    ));
    ?>
    <?php/*
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'ad-grid',
        'dataProvider' => $dataProvider,
        'filter' => $model,
        'columns' => array(
            array(
                "name" => "ad_id",
                'value' => '$data->ad->title'
            ),
            'date',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 70px'),
                'template' => '{delete}',
            ),
        ),
    ));*/
    ?>
</div>