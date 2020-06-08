<?php

class AjaxController extends Controller {

    public function actionContact() {
        $model = new ContactForm;
        $model->attributes = $_POST['ContactForm'];
        if (Yii::app()->getRequest()->getIsAjaxRequest()) {
            echo CActiveForm::validate(array($model));
            Yii::app()->end();
        } else {            
            $mail = new Mail();
            $mail->name = $model->name;
            $mail->email = $model->email;
            $mail->body = $model->body;
            $mail->subject = '88 Rooms - Contact form';
            $mail->addAddress($this->config->email);            
            if ($mail->send()) {
                Yii::app()->user->setFlash('success', Translation::model()->getByKey('mail_sent'));
            } else {
                Yii::app()->user->setFlash('error', __('Error'));
            }
            $this->redirect(Yii::app()->request->urlReferrer);
        }
    }

    public function actionBookNow() {
        $model = new BookNowForm;
        $model->attributes = $_POST['BookNowForm'];
        if (Yii::app()->getRequest()->getIsAjaxRequest()) {
            echo CActiveForm::validate(array($model));
            Yii::app()->end();
        } else {
            //$this->redirect(array('site/bookNow', $_POST['BookNowForm']));
        }
    }

}