<?php

/**
 * Description of BookNow
 *
 * @author Nikola
 */
Yii::import('zii.widgets.CPortlet');

class BookNow extends CPortlet {

    public $title = 'Book Your Room now';
    public $aditionalText = '';
    public $cancelationText = 'Change / Cancel reservation';
    public $boxType = 'normal';
    public $formId = 'book-now-form';
    public $formTitle = '';
    public $type = 'desk';
    public $url = '';

    public function __construct($owner = null) {
        parent::__construct($owner);
    }

    protected function renderContent() {
        if ($this->type == 'mob') {
            $this->url = 'http://secure.phobs.net/webservice/mobile/booking.php';
        } else {
            $this->url = 'http://secure.phobs.net/booking.php';
        }
        $form = new BookNowForm;
        if (isset($_POST['BookNowForm'])) {
            $form->attributes = $_POST['BookNowForm'];
            if ($form->validate()) {
                //$this->controller->redirect(array('site/bookNow', $_POST['BookNowForm']));                
            }
        }
        $this->render('bookNow', array('form' => $form));
    }

    protected function renderDecoration() {
        if ($this->title !== null) {
            if ($this->boxType == 'normal') {
                //echo "<div class='portlet-decoration'><div class='portlet-title'>{$this->title} <span class = 'aditional-text'><span class='grid50p'><a href='" . Utility::createUrl("site/bookNow", array("view_cancel" => 1)) . "' class='view_cancel' target='_blank' onClick='return viewCancelBooking(this,\"phobs_book1\");'>{$this->cancelationText}</a></span><span class='grid50p'>{$this->aditionalText}</span></span></div></div>";
                echo "<div class='portlet-decoration'><div class='portlet-title'>{$this->title} <span class='add-title'>".Translation::model()->getByKey('choose_the_room')."</span></div></div>";
            } else {
                parent::renderDecoration();
            }
        }
    }

}