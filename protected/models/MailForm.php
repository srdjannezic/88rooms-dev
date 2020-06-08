<?php

/**
 * MailForm class.
 */
class MailForm extends CFormModel {

    public $subject;
    public $message;
    public $email;
    public $status;
    public $contact_id;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('subject, email', 'required'),
            array('message, status, contact_id', 'safe')
                // rememberMe needs to be a boolean            
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'subject' => __('Naslov'),
            'message' => __('Poruka'),
            'email' => __('email')
        );
    }

}
