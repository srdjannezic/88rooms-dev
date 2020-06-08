<?php

/**
 * This is the model class for table "hotel_facilities".
 *
 * The followings are the available columns in table 'hotel_facilities':
 * @property integer $id
 * @property string $name
 * @property integer $hotel_facilities_category_id
 * @property integer $ordr
 *
 * The followings are the available model relations:
 * @property HotelFacilitiesCategory $hotelFacilitiesCategory
 * @property HotelFacilitiesLanguages[] $hotelFacilitiesLanguages
 */
class HotelFacility extends Model {

    public function behaviors() {
        return array(
            'ml' => array(
                'class' => 'application.behaviors.MultilingualBehavior',
                'langClassName' => 'HotelFacilitiesLanguage',
                'langTableName' => 'hotel_facilities_languages',
                'langForeignKey' => 'hotel_facility_id',
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
            'sortableModel' => array(
                'class' => 'ext.yiisortablemodel.behaviors.SortableCActiveRecordBehavior',
                'orderField' => 'ordr',
                'relation_field' => 'hotel_facilities_category_id'
            )
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return HotelFacility the static model class
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
        return 'hotel_facilities';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, hotel_facilities_category_id', 'required'),
            array('hotel_facilities_category_id, ordr', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, hotel_facilities_category_id, ordr', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'hotelFacilitiesCategory' => array(self::BELONGS_TO, 'HotelFacilitiesCategory', 'hotel_facilities_category_id'),
            'hotelFacilitiesLanguages' => array(self::HAS_MANY, 'HotelFacilitiesLanguages', 'hotel_facility_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'hotel_facilities_category_id' => 'Room Amenity Category',
            'ordr' => 'Ordr',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($searchArgument = null) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.        
        $criteria = Utility::getCriteria($searchArgument);

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('hotel_facilities_category_id', $this->hotel_facilities_category_id);
        $criteria->compare('ordr', $this->ordr);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'ordr ASC',
                    ),
                ));
    }

}