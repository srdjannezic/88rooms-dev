<?php

/**
 * This is the model class for table "configuration".
 *
 * The followings are the available columns in table 'configuration':
 * @property integer $id
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $coordinate
 * @property integer $cms_slider_id
 *
 * The followings are the available model relations:
 * @property CmsSlider $cmsSlider
 */
class Configuration extends Model {

    public function behaviors() {
        return array(
            'ml' => array(
                'class' => 'application.behaviors.MultilingualBehavior',
                'langClassName' => 'ConfigurationLanguage',
                'langTableName' => 'configuration_languages',
                'langForeignKey' => 'configuration_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('about', 'concept'), //attributes of the model to be translated
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
     * @return Configuration the static model class
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
        return 'configuration';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email, phone, address, lat, lng, home_page', 'required'),
            array('cms_media_id, cms_slider_id, cms_mobile_slider_id, home_page', 'numerical', 'integerOnly' => true),
            array('lat, lng,downtown_lat,downtown_lng, city_offers_archive, special_offers_archive, news_archive, rooms_archive', 'numerical'),
            array('email, facebook, twitter, instagram, linkedin', 'length', 'max' => 255),
            array('phone, address', 'length', 'max' => 100),
            array('concept, about', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, email, phone, address, concept, about, facebook, twitter, instagram,linkedin, cms_media_id, cms_slider_id, lat, lng, home_page,downtown_lat,downtown_lng, city_offers_archive, special_offers_archive, news_archive, rooms_archive, cms_mobile_slider_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cmsMedia' => array(self::BELONGS_TO, 'CmsMedia', 'cms_media_id'),
            'cmsSlider' => array(self::BELONGS_TO, 'CmsSlider', 'cms_slider_id'),
            'cmsMobileSlider' => array(self::BELONGS_TO, 'CmsSlider', 'cms_mobile_slider_id'),
            'page' => array(self::BELONGS_TO, 'CmsObject', 'home_page'),
            'configurationLanguages' => array(self::HAS_MANY, 'ConfigurationLanguage', 'configuration_id'),
            'hotelRoomLanguages' => array(self::HAS_MANY, 'HotelRoomLanguages', 'hotel_room_id'),
            'specialOffersArchive' => array(self::BELONGS_TO, 'CmsObject', 'special_offers_archive'),
            'newsArchive' => array(self::BELONGS_TO, 'CmsObject', 'news_archive'),
            'roomsArchive' => array(self::BELONGS_TO, 'CmsObject', 'rooms_archive'),
            'cityOffersArchive' => array(self::BELONGS_TO, 'CmsObject', 'city_offers_archive'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'email' => 'Email',
            'lat' => 'Latitude',
            'lng' => 'Longitude',
            'phone' => 'Phone',
            'address' => 'Address',
            'about' => 'About',
            'concept' => 'Concept',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'linkedin' => 'Linkedin',
            'cms_media_id' => 'Cms Media',
            'cms_slider_id' => 'Cms Slider',
            'home_page' => 'Home page',
            'cms_mobile_slider_id' => 'Mobile slider'
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
        $criteria->compare('email', $this->email, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('cms_slider_id', $this->cms_slider_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getConfig() {
        $model = $this->findByPk(1);

        return $model;
    }

}