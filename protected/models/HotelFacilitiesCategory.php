<?php

/**
 * This is the model class for table "hotel_facilities_category".
 *
 * The followings are the available columns in table 'hotel_facilities_category':
 * @property integer $id
 * @property string $name
 * @property integer $ordr
 *
 * The followings are the available model relations:
 * @property HotelFacilities[] $hotelFacilities
 * @property HotelFacilitiesCategoryLanguages[] $hotelFacilitiesCategoryLanguages
 */
class HotelFacilitiesCategory extends Model {

    public function behaviors() {
        return array(
            'ml' => array(
                'class' => 'application.behaviors.MultilingualBehavior',
                'langClassName' => 'HotelFacilitiesCategoryLanguage',
                'langTableName' => 'hotel_facilities_category_languages',
                'langForeignKey' => 'hotel_facilities_category_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('name'), //attributes of the model to be translated
                //'localizedPrefix' => 'l_',
                'languages' => CHtml::listData(Language::model()->findAll(), "code", "name"), // array of your translated languages. Example : array('fr' => 'Français', 'en' => 'English')
                'defaultLanguage' => Yii::app()->params['defaultLanguage'], //your main language. Example : 'fr'
            //'createScenario' => 'insert',
            //'localizedRelation' => 'i18nPost',
            //'multilangRelation' => 'multilangPost',
            //'forceOverwrite' => false,
            //'forceDelete' => true, 
            //'dynamicLangClass' => true, //Set to true if you don't want to create a 'PostLang.php' in your models folder
            ),
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return HotelFacilitiesCategory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function defaultScope() {
        return $this->ml->localizedCriteria();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'hotel_facilities_category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('ordr', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, ordr', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'hotelFacilities' => array(self::HAS_MANY, 'HotelFacility', 'hotel_facilities_category_id'),
            'hotelFacilitiesCategoryLanguages' => array(self::HAS_MANY, 'HotelFacilitiesCategoryLanguages', 'hotel_facilities_category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'ordr' => 'Ordr',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('ordr', $this->ordr);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}