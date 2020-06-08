<div class="seven_column-centered">
    <h3><?php echo __('Preporuka prijatelja'); ?></h3>
    <p><?php echo sprintf(__("Poštovani %s"), $send_form->friend_name); ?></p>
    <p><?php echo sprintf(__("Vaš prijatelj %s misli da bi Vas mogao zanimati oglas:"), $send_form->name); ?><br/>
        <?php echo $model->title . " (" . $model->start->name . " - " . $model->end->name . ")"; ?><br/>
        <a id='kickstarter' href="<?php echo Yii::app()->createAbsoluteUrl("site/ad", array("id" => $model->id)); ?>"><?php echo $model->title . " (" . $model->start->name . " - " . $model->end->name . ")"; ?></a></p>
    <p><?php echo __("Komentar:"); ?><br/>
        <?php echo $send_form->text; ?></p>
    <p><?php echo __('S poštovanjem'); ?><br/>
        <?php echo Yii::app()->name; ?>
</div>