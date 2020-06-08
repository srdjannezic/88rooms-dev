<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<?php echo $this->renderPartial("//common/slider", array("slider" => $slider)); ?>
<div class="home-wrap">
    <?php echo $content->text; ?>
    <?php echo $this->renderPartial('//page/partials/blocks', array("model" => $content)); ?>
</div>