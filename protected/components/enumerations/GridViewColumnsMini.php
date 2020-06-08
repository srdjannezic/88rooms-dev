<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GridViewColumnsMini
 *
 * @author nikola.ristivojevic
 */
class GridViewColumnsMini {

    public static function get($modelClass) {
        switch ($modelClass) {
            case "Contact": return self::Contacts();
        }
    }

    public static function Contacts() {
        return array("first_name", "last_name", "username");
    }

    public static function Ads() {
        return array(            
            'title',            
            'price',
            'date_created',
            array(
                'name' => 'status',
                'value' => '$data->_status',
                'type' => 'raw',
                'filter' => CHtml::dropDownList('Ad[status]', $model->status, array('' => '', '0' => __('Kreiran/Izmenjen'), '1' => __('Odobren'), '2' => __('Neodobren'), '3' => __('Kompletiran'))),
                ));
    }

}