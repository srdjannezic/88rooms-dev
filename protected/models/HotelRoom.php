<?php

/**
 * This is the model class for table "hotel_room".
 *
 * The followings are the available columns in table 'hotel_room':
 * @property integer $id
 * @property string $name
 * @property double $price
 * @property integer $people
 * @property string $description
 *
 * The followings are the available model relations:
 * @property HotelRoomLanguages[] $hotelRoomLanguages
 */
class HotelRoom extends Model {

    public $_facilities;
    public $_facilities_featured;
    public $_facilities_selected;
    public $listFacilities;

    public function scopes() {
        return array(
            'visible' => array(
                'condition' => 'visible=1'
            )
        );
    }

    public function behaviors() {
        return array(
            'ml' => array(
                'class' => 'application.behaviors.MultilingualBehavior',
                'langClassName' => 'HotelRoomLanguage',
                'langTableName' => 'hotel_room_languages',
                'langForeignKey' => 'hotel_room_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('name', 'description', 'meta_title', 'meta_description', 'meta_keywords'), //attributes of the model to be translated
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

    public function defaultScope() {
        return $this->ml->localizedCriteria();
    }

    protected function afterFind() {
        parent::afterFind();
        $facilities = $this->facilities;
        foreach ($facilities as $facility) {
            $this->_facilities[] = $facility->id;
        }
        $_facilities_featured = $this->featuredFacilities;
        foreach ($_facilities_featured as $facility) {
            $this->_facilities_featured[] = $facility->id;
        }

        //Utility::dump($this->_facilities);
    }

    protected function afterValidate() {
        if ($this->slug == '') {
            $slug = Helper::generateSlug($this->name);
            $i = 0;
            do {
                $slug_new = $slug . (($i > 0) ? '-' . $i : '');
                $i++;
            } while ($this->exists("slug=:slug", array(":slug" => $slug_new)));
            $this->slug = $slug_new;
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return HotelRoom the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'hotel_room';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, price, people, description', 'required'),
            array('people, cms_media_id, is_featured, visible', 'numerical', 'integerOnly' => true),
            array('price, cms_gallery_id', 'numerical'),
            array('name, slug, meta_keywords', 'length', 'max' => 255),
            array('meta_description', 'length', 'max' => 160),
            array('meta_title', 'length', 'max' => 60),
            array('_facilities, _facilities_featured', 'type', 'type' => 'array', 'allowEmpty' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, price, people, description, cms_media_id,_facilities,_facilities_featured, slug, cms_gallery_id, is_featured, visible, meta_keywords, meta_description, meta_title', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'hotelFacilities' => array(self::HAS_MANY, 'HotelRoomFacility', 'hotel_room_id', 'order' => 'hotelFacilities.ordr ASC'),
            'hotelFacilitiesFeatured' => array(self::HAS_MANY, 'HotelRoomFacilitiesFeatured', 'hotel_room_id', 'order' => 'hotelFacilitiesFeatured.ordr ASC'),
            'facilities' => array(self::HAS_MANY, 'HotelFacility', array('hotel_facility_id' => 'id'), 'through' => 'hotelFacilities', 'order' => 'hotelFacilities.ordr ASC'),
            'featuredFacilities' => array(self::HAS_MANY, 'HotelFacility', array('hotel_room_facility_id' => 'id'), 'through' => 'hotelFacilitiesFeatured', 'order' => 'hotelFacilitiesFeatured.ordr ASC'),
            'facilityCategories' => array(self::HAS_MANY, 'HotelFacilitiesCategory', array('hotel_facilities_category_id' => 'id'), 'through' => 'facilities', 'order' => 'facilityCategories.ordr ASC'),
            'hotelRoomLanguages' => array(self::HAS_MANY, 'HotelRoomLanguages', 'hotel_room_id'),
            'cmsMedia' => array(self::BELONGS_TO, 'CmsMedia', 'cms_media_id'),
            'cmsGallery' => array(self::BELONGS_TO, 'CmsGallery', 'cms_gallery_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'people' => 'People',
            'description' => 'Description',
            'cms_gallery_id' => 'Gallery',
            'visible' => 'Visibility',
            '_facilities' => 'Ameneties',
            '_facilities_featured' => 'Featured ameneties',
            'is_featured' => 'Feature room'
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
        $criteria->compare('price', $this->price);
        $criteria->compare('people', $this->people);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('visible', $this->visible, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getFacilitiesByCategory($id) {
        $model = HotelRoomFacility::model()->with('hotelFacility')->findAll(array("order" => 'hotelFacility.ordr ASC', "condition" => "hotelFacility.hotel_facilities_category_id=:id AND hotel_room_id=:room_id", "params" => array(":id" => $id, ":room_id" => $this->id)));

        return $model;
    }

}
