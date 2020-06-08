<?php

/**
 * This is the model class for table "point_of_interests".
 *
 * The followings are the available columns in table 'point_of_interests':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $location
 * @property integer $ordr
 * @property string $slug
 *
 * The followings are the available model relations:
 * @property CityOffers[] $cityOffers
 * @property PointOfInterestsLanguage[] $pointOfInterestsLanguages
 */
class PointOfInterest extends Model {
    
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
                'langClassName' => 'PointOfInterestsLanguage',
                'langTableName' => 'point_of_interests_language',
                'langForeignKey' => 'point_of_interest_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('name', 'subtitle', 'description'), //attributes of the model to be translated
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
     * @return PointOfInterest the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function defaultScope() {
        return $this->ml->localizedCriteria();
    }

    protected function afterValidate() {
        if ($this->isNewRecord && $this->slug == '') {
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
     * @return string the associated database table name
     */
    public function tableName() {
        return 'point_of_interests';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, lat, lng', 'required'),
            array('ordr, cms_media_id, visible', 'numerical', 'integerOnly' => true),
            array('name, color, subtitle, distance', 'length', 'max' => 255),
            array('slug', 'length', 'max' => 200),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, subtitle, description, lat, lng, ordr, slug, cms_media_id, color, distance, visible', 'safe', 'on' => 'search'),
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
            'cityOffers' => array(self::HAS_MANY, 'CityOffers', 'point_of_interest_id'),
            'pointOfInterestsLanguages' => array(self::HAS_MANY, 'PointOfInterestsLanguage', 'point_of_interest_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'subtitle' => 'Subtitle',
            'description' => 'Description',
            'lat' => 'Latitude',
            'lng' => 'Longitude',
            'ordr' => 'Ordr',
            'slug' => 'Slug',
            'visible' => 'Visibility',
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
        $criteria->compare('subtitle', $this->subtitle, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('ordr', $this->ordr);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('visible', $this->visible, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'ordr ASC',
                    ),
                ));
    }

}
