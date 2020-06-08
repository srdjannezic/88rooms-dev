<?php

class SiteController extends Controller {

    public $layout = 'column1';

    public function actionIndex() {
        $home = Configuration::model()->getConfig()->page;
        $description = (!empty($home->meta_description) ? $home->meta_description : $home->excerpt);
        $title = (!empty($home->meta_title) ? $home->meta_title : $home->title);
        $keywords = $home->meta_keywords;
        $image = ($home->cms_media_id) ? $home->cmsMedia->_image_url : $this->createAbsoluteUrl(Yii::app()->theme->baseUrl . "/assets/images/88_logo.gif");

        $this->pageTitle = $title;

        Yii::app()->clientScript->registerMetaTag($image, null, null, array('property' => "og:image"));
        Yii::app()->clientScript->registerMetaTag($home->title, null, null, array('property' => "og:title"));

        if (!empty($description)) {
            Yii::app()->clientScript->registerMetaTag(strip_tags($description), null, null, array('property' => "og:description"));
            Yii::app()->clientScript->registerMetaTag(strip_tags($description), null, null, array('property' => "description"));
        }
        $this->render('index', array(
            "content" => $home,
            "slider" => (!$this->isMobileBrowser()) ? Configuration::model()->getConfig()->cmsSlider : Configuration::model()->getConfig()->cmsMobileSlider
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

    public function actionBookNow($id = NULL, $nights = NULL, $arrival = NULL, $adults = NULL,$chd = NULL, $access = NULL, $view_cancel=NULL) {
        $this->pageTitle = Yii::app()->name . ' - Book Now';
        //var_dump($this);
        $model = new BookNowForm();
        if ($this->isMobileBrowser()) {
            $url = "https://secure.phobs.net/webservice/mobile/booking.php?company_id=ec7b8fd084dbf9278ce8cf53c3c4b10b&hotel=733cdb9685efbbd59d3c6bf7831f4d49";
        } else {
            $url = "https://secure.phobs.net/booking.php?company_id=ec7b8fd084dbf9278ce8cf53c3c4b10b&hotel=733cdb9685efbbd59d3c6bf7831f4d49";
        }
        $url .='&lang=' . ((Yii::app()->language == 'sr') ? 'rs' : Yii::app()->language);
        
        if($view_cancel == 1){
            $url .= '&view_cancel=1';
        }
        else{
            if (!empty($id)) {
                $url .= '&package=' . $id;
            }

            if (!empty($arrival)) {
                $url .= '&date=' . $arrival;
            }   

            if (!empty($nights)) {
                $url .= '&nights=' . $nights;
            }     

            if (!empty($adults)) {
                $url .= '&adults[1]=' . $adults;
                $url .= "&unit_select=1";
                $url .= "&units=1";
            }   

            if (!empty($chd)) {
                $url .= '&chd[1]=' . $chd;
            }           

            if (!empty($access)) {
                $url .= '&partners_access=' . $access;
            } 
            //var_dump($_POST['phobs_book']);
        }
        if ($_POST['BookNowForm']) {

            //Utility::dump($_POST['BookNowForm']);
            $model->attributes = $_POST['BookNowForm'];

            if ($model->view_cancel) {
                $url .= '&view_cancel=1';
            } else {
                $url .= '&amp;date=' . $model->date . '&amp;nights=' . $model->nights . '&amp;unit_select=1&amp;units=1&amp;adults[1]=' . $model->adults . '&partners_access=' . $model->promo_code;
            }
        }

        //Utility::dump($model->attributes);
        $this->render('bookNow', array("url" => $url));
    }

}