<?php

/**
 * This is the model class for table "special_offers".
 *
 * The followings are the available columns in table 'special_offers':
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $text
 * @property string $date
 * @property integer $minimum_stay
 * @property string $price_from
 * @property string $active_for
 * @property integer $hotel_room_id
 *
 * The followings are the available model relations:
 * @property SpecialOffersLanguages[] $specialOffersLanguages
 */
class SpecialOffer extends Model {

    public function scopes() {
        return array(
            'last' => array(
                'condition' => 'visible=1',
                'order' => 't.id DESC',
                'limit' => 1,
            ),
            'visible' => array(
                'condition' => 'visible=1'
            )
        );
    }

    public function behaviors() {
        return array(
            'ml' => array(
                'class' => 'application.behaviors.MultilingualBehavior',
                'langClassName' => 'SpecialOffersLanguage',
                'langTableName' => 'special_offers_languages',
                'langForeignKey' => 'special_offer_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('title', 'text', 'excerpt', 'meta_title', 'meta_description', 'meta_keywords'), //attributes of the model to be translated
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
                'orderField' => 'ordr'
            )
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SpecialOffer the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function afterFind() {
        parent::afterFind();
        $this->_excerpt = Utility::excerpt($this->text, 230);
    }

    public function defaultScope() {
        return $this->ml->localizedCriteria();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'special_offers';
    }

    protected function afterValidate() {
        $this->active_from = ($this->active_from) ? date("Y-m-d", strtotime($this->active_from)) : date("Y-m-d", strtotime("NOW"));
        $this->active_to = ($this->active_to) ? date("Y-m-d", strtotime($this->active_to)) : date("Y-m-d", strtotime("NOW"));

        if ($this->slug == '') {
            $slug = Helper::generateSlug($this->title);
            $i = 0;
            do {
                $slug_new = $slug . (($i > 0) ? '-' . $i : '');
                $i++;
            } while ($this->exists("slug=:slug", array(":slug" => $slug_new)));
            $this->slug = $slug_new;
        }
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, text, minimum_stay, price_from, active_from, active_to', 'required'),
            array('minimum_stay, hotel_room_id, cms_media_id, minimum_persons, ordr, visible, offer_id', 'numerical', 'integerOnly' => true),
            array('title, slug, meta_keywords, booking_type', 'length', 'max' => 255),
            array('meta_description', 'length', 'max' => 160),
            array('meta_title', 'length', 'max' => 60),
            array('excerpt', 'length', 'max' => 300),
            array('price_from', 'length', 'max' => 10),
            array('active_for', 'length', 'max' => 200),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, slug, text, date, minimum_stay, price_from, active_for, hotel_room_id, cms_media_id, excerpt, active_from, active_to, minimum_persons, ordr, visible, offer_id, meta_keywords, meta_description, meta_title, booking_type', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'specialOffersLanguages' => array(self::HAS_MANY, 'SpecialOffersLanguages', 'special_offer_id'),
            'cmsMedia' => array(self::BELONGS_TO, 'CmsMedia', 'cms_media_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'text' => 'Text',
            'date' => 'Date',
            'minimum_stay' => 'Minimum Stay',
            'price_from' => 'Price From',
            'active_for' => 'Active For',
            'hotel_room_id' => 'Hotel Room',
            'excerpt' => 'Short',
            'minimum_persons' => 'Minimum persons',
            'visible' => 'Visibility',
            'offer_id' => 'Offer id'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($searchArgument = null, $pageSize = 10) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.        
        $criteria = Utility::getCriteria($searchArgument);

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('active_from', $this->date, true);
        $criteria->compare('active_to', $this->date, true);
        $criteria->compare('minimum_stay', $this->minimum_stay);
        $criteria->compare('price_from', $this->price_from, true);
        $criteria->compare('active_for', $this->active_for, true);
        $criteria->compare('excerpt', $this->excerpt, true);
        $criteria->compare('hotel_room_id', $this->hotel_room_id);
        $criteria->compare('visible', $this->visible, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    "sort" => array(
                        'defaultOrder' => "t.ordr ASC",
                    ),
                    "pagination" => array(
                        'pageSize' => $pageSize,
                    ),
                ));
    }

    public function findLatest($limit = 1) {
        return $this->last()->find();
    }

}
