<?php

/**
 * This is the model class for table "hotel_facilities_languages".
 *
 * The followings are the available columns in table 'hotel_facilities_languages':
 * @property integer $id
 * @property string $l_name
 * @property string $language_code
 * @property integer $hotel_facility_id
 *
 * The followings are the available model relations:
 * @property HotelFacilities $hotelFacility
 */
class HotelFacilitiesLanguage extends Model {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return HotelFacilitiesLanguage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'hotel_facilities_languages';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('l_name, language_code, hotel_facility_id', 'required'),
            array('hotel_facility_id', 'numerical', 'integerOnly' => true),
            array('l_name', 'length', 'max' => 255),
            array('language_code', 'length', 'max' => 5),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, l_name, language_code, hotel_facility_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'hotelFacility' => array(self::BELONGS_TO, 'HotelFacilities', 'hotel_facility_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'l_name' => 'L Name',
            'language_code' => 'Language Code',
            'hotel_facility_id' => 'Hotel Facility',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('l_name', $this->l_name, true);
        $criteria->compare('language_code', $this->language_code, true);
        $criteria->compare('hotel_facility_id', $this->hotel_facility_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}