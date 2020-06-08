<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchForm
 *
 * @author Nikola
 */
class SearchForm extends CFormModel {

    public $vehicle_class, $deadline_from, $deadline_to, $start_point, $end_point, $weight, $dimensions, $width, $height, $length;

    //put your code here
    public function rules() {
        return array(
            array('weight,width,height,length', 'numerical', 'integerOnly' => true),
            array('deadline_from, deadline_to',"date"),
            array('vehicle_class, date_created, start_point, end_point, weight, weight,width,height,length', 'safe')
        );
    }

    protected function afterConstruct() {
        parent::afterConstruct();
    }

    public function attributeLabels() {
        return array(
            'vehicle_class' => __('Klasa vozila'),
            'deadline_from' => __('Rok (Ne pre) datuma'),
            'deadline_to' => __('Rok (Ne posle) datuma'),
            'start_point' => __('Mesto polaska'),
            'end_point' => __('Odredište'),
            'weight' => __('Теžina (kg)'),
            "dimensions" => __('Dimenzije'),
            'width' => __('Širina (cm)'),
            'height' => __('Visina (cm)'),
            'length' => __('Dužina (cm)'),
        );
    }

}