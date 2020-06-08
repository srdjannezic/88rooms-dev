<?php echo CHtml::beginForm(); ?>
<div class="control-group date-select">
    <?php echo CHtml::activeLabel($form, 'date'); ?>
    <br/>
    <?php echo CHtml::activeTextField($form, 'date', array("class" => 'datePicker', 'placeholder' => __('Pick a date'))) ?>
    <?php echo CHtml::error($form, 'date'); ?>
</div>
<div class="control-group nights">
    <?php echo CHtml::activeLabel($form, 'nights'); ?>
    <br/>
    <?php echo CHtml::activeDropDownList($form, 'nights', array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10)) ?>
    <?php echo CHtml::error($form, 'nights'); ?>
</div>
<div class="control-group adults">
    <?php echo CHtml::activeLabel($form, 'adults'); ?>
    <br/>
    <?php echo CHtml::activeDropDownList($form, 'adults', array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10)) ?>
    <?php echo CHtml::error($form, 'adults'); ?>
</div>
<div class="control-group last">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => __('Choose your room'),
        'htmlOptions' => array(
            'class' => 'book-now-btn'
        )
    ));
    ?>    
</div>
<?php echo CHtml::endForm(); ?>