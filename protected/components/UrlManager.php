<?php

class UrlManager extends CUrlManager {

    public function createUrl($route, $params = array(), $ampersand = '&') {
        if (!isset($params['_lang'])) {
            if (Yii::app()->user->hasState('language'))
                Yii::app()->language = Yii::app()->user->getState('language');
            else if (isset(Yii::app()->request->cookies['_lang']))
                Yii::app()->language = Yii::app()->request->cookies['_lang']->value;
            $params['_lang'] = Yii::app()->language;
        }
        return parent::createUrl($route, $params, $ampersand);
    }

}