<?php Yii::import('ext.gmap.*'); ?>
<div class="page-wrap <?php echo $model->slug; ?>">
    <div class="title">
        <h1><?php echo $model->title; ?></h1>
    </div>    

    <?php echo $this->renderPartial('templates/' . $model->template->short_code, array("model" => $model)); ?>

    <?php echo $this->renderPartial('partials/blocks', array("model" => $model)); ?>
</div>