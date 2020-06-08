<?php

/**
 * This is the model class for table "point_of_interests_language".
 *
 * The followings are the available columns in table 'point_of_interests_language':
 * @property integer $id
 * @property string $l_name
 * @property string $l_description
 * @property integer $point_of_interest_id
 * @property integer $language_code
 *
 * The followings are the available model relations:
 * @property PointOfInterests $pointOfInterest
 */
class PointOfInterestsLanguage extends Model {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PointOfInterestsLanguage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'point_of_interests_language';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('l_name, l_description,l_subtitle, point_of_interest_id, language_code', 'required'),
            array('point_of_interest_id, language_code', 'numerical', 'integerOnly' => true),
            array('l_name, l_subtitle', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, l_name,l_subtitle, l_description, point_of_interest_id, language_code', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pointOfInterest' => array(self::BELONGS_TO, 'PointOfInterests', 'point_of_interest_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'l_name' => 'L Name',
            'l_subtitle' => 'L Subtitle',
            'l_description' => 'L Description',
            'point_of_interest_id' => 'Point Of Interest',
            'language_code' => 'Language Code',
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
        $criteria->compare('l_name', $this->l_name, true);
        $criteria->compare('l_subtitle', $this->l_subtitle, true);
        $criteria->compare('l_description', $this->l_description, true);
        $criteria->compare('point_of_interest_id', $this->point_of_interest_id);
        $criteria->compare('language_code', $this->language_code);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}