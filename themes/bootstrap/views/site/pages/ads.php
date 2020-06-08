<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<div id="inner-content">
    <h2 class="title"><?php echo __("Oglasi"); ?></h2>
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => 'partials/_view',
        'sortableAttributes' => array(),
        'summaryText' => '',
        'ajaxUpdate' => true,
        'id' => 'vesti',
        'pager' => array(
            'header' => '',
            'firstPageLabel' => '&lt;&lt;',
            'prevPageLabel' => 'Prethodna',
            'nextPageLabel' => 'Sledeća',
            'lastPageLabel' => '&gt;&gt;',
        ),
    ));
    ?>
</div>