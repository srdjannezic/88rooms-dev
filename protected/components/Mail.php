<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mail
 *
 * @author Nikola
 */
Yii::import('application.extensions.phpmailer.JPhpMailer');

class Mail {

    private $mail;
    public $email;
    public $name;    
    public $html;
    public $mail_data = null;
    public $subject;
    public $body = null;
    public $altBody = null;

    public function __construct() {
        $this->mail = new JPhpMailer;
        //$this->mail->IsSMTP();
        $this->mail->IsHTML();
        //$this->mail->Host = param('mailHost');
        //$this->mail->SMTPAuth = true;
        //$this->mail->Username = param('mailUsername');
        //$this->mail->Password = param('mailPassword');
        $this->mail->CharSet = 'UTF-8';
        //$this->mail->SetFrom($this->email, $this->name);
    }

    public function addAddress($email, $name = '') {
        $this->mail->AddAddress($email, $name);
    }

    public function addStringAttachment($file, $name) {
        $this->mail->AddStringAttachment($file, $name);
    }

    public function send() {
        $this->mail->From = $this->email;
        $this->mail->FromName = $this->name;
        $this->mail->Subject = $this->subject;
        $this->mail->Body = $this->body;
        //$this->mail->Body = Yii::app()->mustache->render('mail', $this->mail_data);
        return $this->mail->Send();
    }

    public function clearAllRecipients() {
        $this->mail->ClearAllRecipients();
    }

}