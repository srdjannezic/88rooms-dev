<?php

/**
 * This is the model class for table "configuration_languages".
 *
 * The followings are the available columns in table 'configuration_languages':
 * @property integer $id
 * @property string $l_about
 * @property string $l_concept
 * @property string $language_code
 * @property integer $configuration_id
 *
 * The followings are the available model relations:
 * @property Configuration $configuration
 */
class ConfigurationLanguage extends Model {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ConfigurationLanguage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'configuration_languages';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('language_code, configuration_id', 'required'),
            array('configuration_id', 'numerical', 'integerOnly' => true),
            array('language_code', 'length', 'max' => 10),
            array('l_about, l_concept', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, l_about, l_concept, language_code, configuration_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'configuration' => array(self::BELONGS_TO, 'Configuration', 'configuration_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'l_about' => 'L About',
            'l_concept' => 'L Concept',
            'language_code' => 'Language Code',
            'configuration_id' => 'Configuration',
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
        $criteria->compare('l_about', $this->l_about, true);
        $criteria->compare('l_concept', $this->l_concept, true);
        $criteria->compare('language_code', $this->language_code, true);
        $criteria->compare('configuration_id', $this->configuration_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}