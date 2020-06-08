<?php

/**
 * This is the model class for table "translations".
 *
 * The followings are the available columns in table 'translations':
 * @property integer $id
 * @property string $key
 * @property string $word
 *
 * The followings are the available model relations:
 * @property WordTypes $wordType
 * @property Languages $language
 * @property BackendUser $user
 * @property TranslationsLanguage[] $translationsLanguages
 */
class Translation extends Model {

    public function behaviors() {
        return array(
            'ml' => array(
                'class' => 'application.behaviors.MultilingualBehavior',
                'langClassName' => 'TranslationsLanguage',
                'langTableName' => 'translations_language',
                'langForeignKey' => 'translation_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('word'), //attributes of the model to be translated
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

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Translation the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'translations';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('key, word', 'required'),
            array('key, word', 'length', 'max' => 300),
            array('key', 'unique'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, key, word', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'translationsLanguages' => array(self::HAS_MANY, 'TranslationsLanguage', 'translation_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'key' => 'Key',
            'word' => 'Word',
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
        $criteria->compare('`key`', $this->key, true);
        $criteria->compare('`word`', $this->word, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $this->ml->modifySearchCriteria($criteria),
                ));
    }

    public function getByKey($key) {
        return $this->findByAttributes(array("key" => $key))->word;
    }

}