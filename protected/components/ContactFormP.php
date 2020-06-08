<?php

/**
 * Description of BookNow
 *
 * @author Nikola
 */
Yii::import('zii.widgets.CPortlet');

class ContactFormP extends CPortlet {

    public $title = 'Send us an email';
    public $url = '';

    protected function renderContent() {        
        $form = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $form->attributes = $_POST['ContactForm'];
            if ($form->validate())
                $this->controller->refresh();
        }
        $this->render('contactForm', array('model' => $form));
    }
    protected function renderDecoration() {
        $this->title = Translation::model()->getByKey('send_us_an_email');
        parent::renderDecoration();
    }

}