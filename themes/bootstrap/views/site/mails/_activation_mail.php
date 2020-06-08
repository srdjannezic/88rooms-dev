<div class="seven_column-centered">
    <h3><?php echo __('Aktivacioni mail'); ?></h3>
    <p><?php echo sprintf(__('Poštovani %s '), $model->_fulName); ?></p>
    <p><?php echo sprintf(__('Molimo Vas da aktivirate Vaš nalog klikom na sledeći %s'), "<a id='kickstarter' href='" . Yii::app()->createAbsoluteUrl("site/activation", array("code" => $model->activation_code)) . "'>link</a>"); ?></p>
    <p>
        <?php echo __('S poštovanjem'); ?>
        <br>
        <?php echo Yii::app()->name; ?>
    </p>
    <br>
</div>