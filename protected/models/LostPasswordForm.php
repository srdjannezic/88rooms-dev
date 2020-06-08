<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LostPasswordForm
 *
 * @author Nikola
 */
class LostPasswordForm extends CFormModel {

    public $email;

    //put your code here
    public function rules() {
        return array(
            array('email', 'required'),
            array('email', 'email'),
            array('email', 'checkEmail'),
            array('email', 'length', 'max' => 255),
        );
    }

    protected function afterConstruct() {
        parent::afterConstruct();
    }

    public function checkEmail($attribute,$params) {
        $record = Contact::model()->exists("email=:email",array(':email' => $this->email));        
        if (empty($record)) {
            $this->addError($attribute, __('Email ne postoji u bazi.'));
        }
    }

    public function attributeLabels() {
        return array(
            'email' => __('Email'),
        );
    }

}