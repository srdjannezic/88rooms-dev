<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<h2 class="title-bar light"><?php echo __("Vaši oglasi"); ?></h2>
<div id="inner-content">
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'sortableAttributes' => array(
            'date_created', 'title'
        ),
        'dataProvider' => $dataProvider,
        'itemView' => 'profile/advertiser/partials/_view_ad',
    ));
    ?> 
    <?php
    /*
      $this->widget('bootstrap.widgets.TbGridView', array(
      'id' => 'ad-grid',
      'dataProvider' => $dataProvider,
      'filter' => $model,
      'columns' => array(
      'id',
      'title',
      'weight',
      'dimensions',
      'price',
      'date_created',
      /*
      'deadline',
      'description',
      'start_point',
      'end_point',
      'status',
      'user_id',

      array(
      'class' => 'bootstrap.widgets.TbButtonColumn',
      'htmlOptions' => array('style' => 'width: 70px'),
      'template' => '{view} {update}',
      "buttons" => array(
      'view' => array(
      'label' => __('Pogledaj oglas'), // text label of the button
      'icon' => 'icon-eye-open',
      'url' => 'Yii::app()->createUrl("/site/profileAdDetail", array("id"=>$data["id"]))',
      ),
      'update' => array(
      'label' => __('Izmeni oglas'), // text label of the button
      'icon' => 'icon-pencil',
      'url' => 'Yii::app()->createUrl("/site/profileAdUpdate", array("id"=>$data["id"]))',
      'visible' => '$data["status"]!=3'
      ),
      )
      ),
      ),
      )); */
    ?>
</div>