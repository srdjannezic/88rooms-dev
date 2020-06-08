<?php
/* @var $this SiteController */
?>
<div class="main-slider">
    <?php echo $this->renderPartial("//common/slider", array("slider" => $slider, "class" => 'main')); ?>
</div>
<div class="home-wrap">
    <span class="circles-small-b"></span>
    <?php echo $content->text; ?>

    <?php echo $this->renderPartial('//page/partials/blocks', array("model" => $content)); ?>
</div>