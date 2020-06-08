<?php if ($this->formTitle): ?>
<h3 class="book-now-title"><?php echo $this->formTitle; ?> <span><?php echo Translation::model()->getByKey('choose_the_room');?></span></h3>
<?php endif; ?>
<div class="cont-add">
    <a target="_blank" href="<?php echo param('bookingBaseUrl'); ?>" class="new-book-btn">
        <?php echo Translation::model()->getByKey('book_now'); ?>
    </a>
    <span class="aditional-text">
        <span class="grid50p"><a target="_blank" href="<?php echo param('bookingBaseUrl'); ?>/V8Client/ShowResNoLog.aspx" class="view_cancel"><?php echo $this->cancelationText; ?></a></span>
    </span>
</div>
<?php/*
$frm = $this->beginWidget('CActiveForm', array(
    //'id' => $this->id,
    'enableAjaxValidation' => true,
    'action' => Utility::createUrl("site/bookNow"),
    'htmlOptions' => array(
        'name' => ($this->boxType == 'drop') ? 'phobs_book' : 'phobs_book1',    
    ),
    'clientOptions' => array(
        )));
?>
<div class="control-group date-select">
    <?php echo $frm->labelEx($form, 'date'); ?>
    <br/>
    <?php echo $frm->textField($form, 'date', array("class" => 'datePicker', 'placeholder' => Translation::model()->getByKey('pick_a_date'))) ?>
    <?php echo $frm->error($form, 'date'); ?>
</div>
<div class="control-group nights">
    <?php echo $frm->labelEx($form, 'nights'); ?>
    <br/>
    <?php echo $frm->dropDownList($form, 'nights', array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10)) ?>
    <?php echo $frm->error($form, 'nights'); ?>
</div>
<div class="control-group adults">
    <?php echo $frm->labelEx($form, 'adults'); ?>
    <br/>
    <?php echo $frm->dropDownList($form, 'adults', array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10)) ?>
    <?php echo $frm->error($form, 'adults'); ?>
</div>
<div class="control-group promo-code">
    <?php echo $frm->labelEx($form, 'promo_code'); ?>
    <?php echo $frm->passwordField($form, 'promo_code') ?>
    <?php echo $frm->error($form, 'promo_code'); ?>
</div> 
<input name="company_id" type="hidden" value="ec7b8fd084dbf9278ce8cf53c3c4b10b" style="display: none"/>
<input name="BookNowForm[view_cancel]" type="hidden" value="" style="display: none" />
<input name="lang" type="hidden" value="rs" style="display: none" />
<div class="control-group btn last">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => Translation::model()->getByKey('choose_your_room'),
        'htmlOptions' => array(
            'class' => 'book-now-btn'
        )
    ));
    ?>    
</div>
<?php $this->endWidget(); ?>
<?php if ($this->boxType == 'drop'): ?>
    <span class="aditional-text">
        <span class="grid50p"><?php echo $this->aditionalText; ?></span>
        <span class="grid50p right-aligned"><a href="<?php echo Utility::createUrl("site/bookNow", array("view_cancel" => 1)); ?>" class="view_cancel" onClick="return viewCancelBooking(this, '<?php echo ($this->boxType == 'drop') ? 'phobs_book' : 'phobs_book1'; ?>');"><?php echo $this->cancelationText; ?></a></span>
    </span>    
<?php endif; */?>