<div class="seven_column-centered">
    <h3><?php echo __('Izgubljena šifra'); ?></h3>
    <p><?php echo sprintf(__('Poštovani %s '), $model->_fulName); ?></p>
    <p><?php echo sprintf(__('Vaša nova šifra je  %s'), $new_password); ?></p>
    <p>
        <?php echo __('S poštovanjem'); ?>
        <br>
        <?php echo Yii::app()->name; ?>
    </p>
    <br>
</div>