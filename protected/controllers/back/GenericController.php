<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenericController
 *
 * @author nikola.ristivojevic
 */
class GenericController extends Controller {

    public function actionRefreshFlashAlert() {
        $text = $_POST['text'];
        $type = $_POST['type'];

        if (isset($text)) {
            if (isset($type)) {
                switch ($type) {
                    case "success": Utility::setFlashSuccess($text);
                        break;
                    case "error": Utility::setFlashError($text);
                        break;
                    case "notice": Utility::setFlashNotice($text);
                        break;
                }
            } else {
                Utility::setFlashSuccess($text);
            }
        }


        $this->widget('ext.bootstrap.widgets.TbAlert', array(
            'block' => true, // display a larger alert block?
            'fade' => true, // use transitions?
            'closeText' => '&times;', // close link text - if set to false, no close link is displayed
            'alerts' => array(// configurations per alert type
                "{$type}" => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
            ),
        ));
    }

    public function actionFlashNotification() {
        
    }

}