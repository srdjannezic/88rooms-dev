<?php

/**
 * This is the model class for table "city_offer_languages".
 *
 * The followings are the available columns in table 'city_offer_languages':
 * @property integer $id
 * @property string $l_title
 * @property string $l_text
 * @property integer $language_code
 * @property integer $city_offer_id
 */
class CityOfferLanguage extends Model {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CityOfferLanguage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'city_offer_languages';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('l_title, l_text, language_code, city_offer_id', 'required'),
            array('city_offer_id', 'numerical', 'integerOnly' => true),
            array('language_code, l_title', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, l_title, l_text, language_code, city_offer_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'l_title' => 'L Title',
            'l_text' => 'L Text',
            'language_code' => 'Language Code',
            'city_offer_id' => 'City Offer',
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
        $criteria->compare('l_title', $this->l_title, true);
        $criteria->compare('l_text', $this->l_text, true);
        $criteria->compare('language_code', $this->language_code);
        $criteria->compare('city_offer_id', $this->city_offer_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}