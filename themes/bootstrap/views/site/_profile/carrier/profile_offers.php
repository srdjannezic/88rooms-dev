<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<h2 class="title-bar light"><?php echo __("Vaše ponude"); ?></h2>
<div id="inner-content" class="bg-white">
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'ad-grid',
        'dataProvider' => $dataProvider,
        'filter' => $model,
        'columns' => array(
            'date_created',
            'description',
            'offer',
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
                        'label' => __('Obriši ponudu'), // text label of the button
                        'icon' => 'icon-trash',
                        'url' => 'Yii::app()->createUrl("/profile/profileDeleteOffer", array("id"=>$data["id"]))',
                        'visible' => '$data["status"]!=3'
                    ),
                )
            ),
        ),
    ));
    ?>
</div>