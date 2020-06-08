<?php

/**
 * Description of BookNowForm
 *
 * @author Nikola
 */
class BookNowForm extends CFormModel {

    public $date;
    public $nights;
    public $adults;
    public $promo_code;
    public $view_cancel;
    public $company_id = 'ec7b8fd084dbf9278ce8cf53c3c4b10b';
    public $hotel = '733cdb9685efbbd59d3c6bf7831f4d49';
    public $lang = 'en';
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('date, nights, adults', 'required'),
            array('promo_code', 'length', 'max' => 255),
            array('date, view_cancel, company_id, hotel, lang', 'safe')
                // rememberMe needs to be a boolean
                //array('date', 'date')
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'date' => Translation::model()->getByKey('your_arrival_date'),
            'nights' => Translation::model()->getByKey('nights'),
            'adults' => Translation::model()->getByKey('adults'),
            'promo_code' => Translation::model()->getByKey('promo_code').":",
        );
    }

    public function getCheckoutDate() {
        if ($this->date) {
            $date = strtotime("+" . $this->nights . " days", strtotime($this->date));
            return date("Y-m-d", $date);
        }

        return '';
    }

}