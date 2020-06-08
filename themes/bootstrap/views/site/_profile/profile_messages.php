<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<h2 class="title-bar light"><?php echo __("Vaše poruke"); ?></h2>
<div id="inner-content" class="bg-white">
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'sortableAttributes' => array(
            'date_created'
        ),
        'dataProvider' => $dataProvider,
        'itemView' => 'profile/advertiser/partials/_view_message',
    ));
    ?>
    <?php
    /*
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'ad-grid',
        'dataProvider' => $dataProvider,
        'filter' => $model,
        'columns' => array(
            'message',
            'date_created',
            array(
                'name' => 'status',
                'value' => '$data->_status',
                'type' => 'raw'
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 70px'),
                'template' => '{delete}',
                "buttons" => array(
                    'delete' => array(
                        'label' => __('Obriši poruku'), // text label of the button
                        'icon' => 'icon-trash',
                        'url' => 'Yii::app()->createUrl("/site/profileDeleteMessage", array("id"=>$data["id"]))',
                    ),
                )
            ),
        ),
    ));*/
    ?>
</div>