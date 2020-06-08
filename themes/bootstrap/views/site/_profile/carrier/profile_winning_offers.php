<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<h2 class="title-bar light"><?php echo __("Dobijene ponude"); ?></h2>
<div id="inner-content" class="bg-white'">
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'ad-grid',
        'dataProvider' => $dataProvider,
        'filter' => $model,
        'columns' => array(
            'ad_id',
            'date_created',
            'description',
            'offer',
        ),
    ));
    ?>
</div>