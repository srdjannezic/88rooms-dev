<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SelectBoxOptions
 *
 * @author nikola.ristivojevic
 */
class SelectBoxOptions {

    public static function Contacts($initialValue = null, $afterSelect = null) {
        return array(
            "url" => Yii::app()->createUrl("/contacts/find",array("scope" => 1)),
            "columns" => GridViewColumnsMini::Contacts(),
            'textPattern' => "#1 #2",
            "modelClass" => "Contact",
            "initialValue" => $initialValue,
            "afterSelect" => $afterSelect,
        );
    }

    public static function Advertiser($initialValue = null, $afterSelect = null) {
        return array(
            "url" => Yii::app()->createUrl("/advertisers/find"),
            "columns" => GridViewColumnsMini::Contacts(),
            'textPattern' => "#1 #2",
            "modelClass" => "Advertiser",
            "initialValue" => $initialValue,
            "afterSelect" => $afterSelect,
        );
    }
    
    public static function Carrier($initialValue = null, $afterSelect = null) {
        return array(
            "url" => Yii::app()->createUrl("/carriers/find"),
            "columns" => GridViewColumnsMini::Contacts(),
            'textPattern' => "#1 #2",
            "modelClass" => "Carrier",
            "initialValue" => $initialValue,
            "afterSelect" => $afterSelect,
        );
    }
    public static function Ads($initialValue = null, $afterSelect = null) {
        return array(
            "url" => Yii::app()->createUrl("/ads/find"),
            "columns" => GridViewColumnsMini::Ads(),
            'textPattern' => "#1 #2",
            "modelClass" => "Ad",
            "initialValue" => $initialValue,
            "afterSelect" => $afterSelect,
        );
    }

}