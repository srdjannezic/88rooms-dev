<div class="seven_column-centered">
    <h3><?php echo __('Izabrali ste ponudu'); ?></h3>
    <p><?php echo sprintf(__('Poštovani %s '), $contact->_fulName); ?></p>
    <p><?php echo sprintf(__('Izabrali ste ponudu %s kao konačnu'), $model->offer . " RSD"); ?></p>
    <p><?php echo __("Oglas"); ?></p>
    <p><?php echo $model->ad->title . "(" . $model->ad->start->name . " - " . $model->ad->end->name . ")"; ?></p>
    <p><?php echo $model->ad->description; ?></p>
    <p>
        <?php echo __('S poštovanjem'); ?>
        <br>
        <?php echo Yii::app()->name; ?>
    </p>
    <br>
</div>