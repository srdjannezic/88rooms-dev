<?php

/**
 * This is the model class for table "cms_slider_boxes".
 *
 * The followings are the available columns in table 'cms_slider_boxes':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $btn_text
 * @property string $url
 * @property integer $cms_slider_id
 * @property integer $cms_object_id
 * @property integer $ordr
 *
 * The followings are the available model relations:
 * @property CmsObjects $cmsObject
 * @property CmsSlider $cmsSlider
 * @property CmsSliderBoxesLanguages[] $cmsSliderBoxesLanguages
 */
class CmsSliderBox extends Model {

    public $type;

    public function behaviors() {
        return array(
            'ml' => array(
                'class' => 'application.behaviors.MultilingualBehavior',
                'langClassName' => 'CmsSliderBoxesLanguage',
                'langTableName' => 'cms_slider_boxes_languages',
                'langForeignKey' => 'cms_slider_boxes_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('title', 'text', 'btn_text'), //attributes of the model to be translated
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
                'relation_field' => 'cms_slider_id'
            )
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CmsSliderBox the static model class
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
        return 'cms_slider_boxes';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cms_slider_id', 'required'),
            array('cms_slider_id, cms_object_id, ordr', 'numerical', 'integerOnly' => true),
            array('title, text, btn_text, url, type', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, text, btn_text, url, cms_slider_id, cms_object_id, ordr, type', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cmsObject' => array(self::BELONGS_TO, 'CmsObject', 'cms_object_id'),
            'cmsSlider' => array(self::BELONGS_TO, 'CmsSlider', 'cms_slider_id'),
            'cmsSliderBoxesLanguages' => array(self::HAS_MANY, 'CmsSliderBoxesLanguages', 'cms_slider_boxes_id'),
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
            'btn_text' => 'Btn Text',
            'url' => 'Url',
            'cms_slider_id' => 'Cms Slider',
            'cms_object_id' => 'Cms Object',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('btn_text', $this->btn_text, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('cms_slider_id', $this->cms_slider_id);
        $criteria->compare('cms_object_id', $this->cms_object_id);
        $criteria->compare('ordr', $this->ordr);

        return new CActiveDataProvider($this, array(
                    'criteria' => $this->ml->modifySearchCriteria($criteria),
                ));
    }

}