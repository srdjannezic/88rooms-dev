<?php

/**
 * This is the model class for table "languages".
 *
 * The followings are the available columns in table 'languages':
 * @property integer $id
 * @property string $name
 * @property string $code
 *
 * The followings are the available model relations:
 * @property CmsObjectLanguages[] $cmsObjectLanguages
 * @property Translation[] $translations
 */
class Language extends Model {

    public function scopes() {
        return array(
            'visible' => array(
                'condition' => 'visible=1',
            )
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Language the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'languages';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, code, visible', 'required'),
            array('name', 'length', 'max' => 30),
            array('code', 'length', 'max' => 20),
            array('short', 'length', 'max' => 3),
            array('visible', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, code, short, visible', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cmsObjectLanguages' => array(self::HAS_MANY, 'CmsObjectLanguages', 'language_id'),
            'translations' => array(self::HAS_MANY, 'Translation', 'language_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'short' => 'Short name',
            'code' => 'Code',
            'visible' => 'Visible',
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
        $criteria->compare('short', $this->short, true);
        $criteria->compare('code', $this->code, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}