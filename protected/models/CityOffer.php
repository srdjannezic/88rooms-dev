<?php

/**
 * This is the model class for table "city_offers".
 *
 * The followings are the available columns in table 'city_offers':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $date
 * @property string $slug
 * @property integer $point_of_interest_id
 *
 * The followings are the available model relations:
 * @property PointOfInterests $pointOfInterest
 */
class CityOffer extends Model {

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
                'langClassName' => 'CityOfferLanguage',
                'langTableName' => 'city_offer_languages',
                'langForeignKey' => 'city_offer_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('title', 'text', 'meta_title', 'meta_description', 'meta_keywords'), //attributes of the model to be translated
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
     * @return CityOffer the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'city_offers';
    }

    public function defaultScope() {
        return $this->ml->localizedCriteria();
    }

    protected function afterFind() {
        parent::afterFind();
        $this->_excerpt = Utility::excerpt($this->text, 400);
    }

    protected function afterValidate() {
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
            array('title, text', 'required'),
            array('point_of_interest_id, cms_media_id, ordr, visible', 'numerical', 'integerOnly' => true),
            array('title, meta_keywords', 'length', 'max' => 255),
            array('meta_description', 'length', 'max' => 160),
            array('meta_title', 'length', 'max' => 60),
            array('slug', 'length', 'max' => 150),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, text, date, slug, point_of_interest_id, cms_media_id, ordr, visible, meta_keywords, meta_description, meta_title', 'safe', 'on' => 'search'),
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
            'pointOfInterest' => array(self::BELONGS_TO, 'PointOfInterests', 'point_of_interest_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'date' => 'Date',
            'slug' => 'Slug',
            'point_of_interest_id' => 'Point Of Interest',
            'ordr' => 'Order',
            'visible' => 'Visibility'
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
        $criteria->compare('text', $this->text, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('point_of_interest_id', $this->point_of_interest_id);
        $criteria->compare('visible', $this->visible, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $this->ml->modifySearchCriteria($criteria),
                    "sort" => array(
                        'defaultOrder' => "ordr ASC",
                    ),
                    "pagination" => array(
                        'pageSize' => $pageSize,
                    ),
                ));
    }

}
