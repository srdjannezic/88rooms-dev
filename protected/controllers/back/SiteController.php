<?php

class SiteController extends BackEndController {

    public $layout = '//layouts/column2';

    public function actionIndex() {
        
        $users = User::model()->count();
        $cms_objects = CmsObject::model()->count();
        $languages = Language::model()->count();
        $pois = PointOfInterest::model()->count();
        $rooms = HotelRoom::model()->count();

        $this->render('index', array(
            "users" => $users,
            "cms_objects" => $cms_objects,
            "languages" => $languages,
            "pois" => $pois,
            "rooms" => $rooms,
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->layout = '//layouts/column1';
        if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH)
            throw new CHttpException(500, "This application requires that PHP was compiled with Blowfish support for crypt().");

        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(array("index"));
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(array("login"));
    }

}