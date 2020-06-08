<?php
$current_date = date('Y-m-d');
$next_date = date('Y-m-d',strtotime('+1 day'));
?>
<div class="book-section cf">
    <div class="container_12 cf">
        <div class="book-now-form grid_6 first">
<div class="portlet" id="yw2">
<div class="portlet-decoration"><div class="portlet-title">BOOK YOUR ROOM NOW <span class="add-title">Choose the room that suits you best.</span></div></div><div class="portlet-content">
<div class="cont-add">
    <a href="/book-now/" class="new-book-btn">
        Book now    </a>
    <span class="aditional-text">
        <span class="grid50p"><a target="_blank" href="/book-now/?view_cancel=1" class="view_cancel">Change / Cancel reservation</a></span>
    </span>
</div>
</div>
</div>
            <?php /*
            $this->widget('BookNow', array(
                "aditionalText" => "* " . Translation::model()->getByKey('all_fields_are_mandatory'),
                'cancelationText' => Translation::model()->getByKey('cancel_reservation'),
                "title" => Translation::model()->getByKey('book_your_room_now'),
            ));*/
            ?>
        </div>
        <div class="grid_6">
            <?php $this->widget('SpecialOfferLatest'); ?>
        </div>
    </div>
</div>