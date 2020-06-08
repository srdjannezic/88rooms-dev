<div class="seven_column-centered">
    <h3><?php echo __('Vaša ponuda je izabrana kao konačna'); ?></h3>
    <p><?php echo sprintf(__('Poštovani %s '), $contact->_fulName); ?></p>
    <p><?php echo sprintf(__('Vaša ponuda je izabrana kao konačna za oglas %s'), $model->ad->start->name . " - " . $model->ad->end->name); ?></p>
    <p><b><?php echo __("Ponuda"); ?></b></p>
    <p><?php echo $model->offer; ?> <?php echo __('RSD'); ?></p>
    <p><b><?php echo __("Oglas"); ?></b></p>
    <p><?php echo $model->ad->title . "(" . $model->ad->start->name . " - " . $model->ad->end->name . ")"; ?></p>
    <p><?php echo $model->ad->description; ?></p>
    <p>
        <?php echo __('S poštovanjem'); ?>
        <br>
        <?php echo Yii::app()->name; ?>
    </p>
    <br>
</div>