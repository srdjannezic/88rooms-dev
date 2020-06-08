<?php

/**
 * This is the model class for table "menu_item".
 *
 * The followings are the available columns in table 'menu_item':
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property integer $cms_object_id
 * @property string $class
 * @property integer $target
 * @property integer $ordr
 * @property integer $menu_id
 *
 * The followings are the available model relations:
 * @property Menu $menu
 * @property CmsObjects $cmsObject
 */
class MenuItem extends Model {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MenuItem the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function behaviors() {
        return array(
            'ml' => array(
                'class' => 'application.behaviors.MultilingualBehavior',
                'langClassName' => 'MenuItemLanguage',
                'langTableName' => 'menu_item_languages',
                'langForeignKey' => 'menu_item_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('title'), //attributes of the model to be translated
                //'localizedPrefix' => 'l_',
                'languages' => CHtml::listData(Language::model()->findAll(), "code", "name"), // array of your translated languages. Example : array('fr' => 'Français', 'en' => 'English')
                'defaultLanguage' => Yii::app()->params['defaultLanguage'], //your main language. Example : 'fr'
            //'createScenario' => 'insert',
            //'localizedRelation' => 'cmsObjectLanguages',
            //'multilangRelation' => 'cmsObjectLanguages',
            //'forceOverwrite' => false,
            //'forceDelete' => true, 
            //'dynamicLangClass' => true, //Set to true if you don't want to create a 'PostLang.php' in your models folder
            ),
        );
    }

    public function defaultScope() {
        return $this->ml->localizedCriteria();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'menu_item';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('menu_id', 'required'),
            array('cms_object_id, target, ordr, menu_id', 'numerical', 'integerOnly' => true),
            array('title, url, class', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, url, cms_object_id, class, target, ordr, menu_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
            'cmsObject' => array(self::BELONGS_TO, 'CmsObject', 'cms_object_id'),
            'menuItemLanguages' => array(self::HAS_MANY, 'MenuItemLanguage', 'menu_item_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'cms_object_id' => 'Cms Object',
            'class' => 'Class',
            'target' => 'Target',
            'ordr' => 'Ordr',
            'menu_id' => 'Menu',
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
        $criteria->compare('url', $this->url, true);
        $criteria->compare('cms_object_id', $this->cms_object_id);
        $criteria->compare('class', $this->class, true);
        $criteria->compare('target', $this->target);
        $criteria->compare('ordr', $this->ordr);
        $criteria->compare('menu_id', $this->menu_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $this->ml->modifySearchCriteria($criteria),
                ));
    }

}