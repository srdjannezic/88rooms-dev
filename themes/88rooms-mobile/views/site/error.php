<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Error';
?>

<div class="page-wrap">
    <div class="title">
        <h1>Error <?php echo $code; ?></h1>
    </div>    
    <div class="container_12">
        <?php echo CHtml::encode($message); ?>
    </div>
</div>