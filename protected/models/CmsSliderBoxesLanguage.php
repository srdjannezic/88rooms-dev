<?php

/**
 * This is the model class for table "cms_slider_boxes_languages".
 *
 * The followings are the available columns in table 'cms_slider_boxes_languages':
 * @property integer $id
 * @property string $l_title
 * @property string $l_text
 * @property string $l_btn_text
 * @property integer $cms_slider_boxes_id
 * @property string $language_code
 *
 * The followings are the available model relations:
 * @property CmsSliderBoxes $cmsSliderBoxes
 */
class CmsSliderBoxesLanguage extends Model {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CmsSliderBoxesLanguage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cms_slider_boxes_languages';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('l_title, l_text, l_btn_text, cms_slider_boxes_id, language_code', 'required'),
            array('cms_slider_boxes_id', 'numerical', 'integerOnly' => true),
            array('l_title, l_text, l_btn_text', 'length', 'max' => 255),
            array('language_code', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, l_title, l_text, l_btn_text, cms_slider_boxes_id, language_code', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cmsSliderBoxes' => array(self::BELONGS_TO, 'CmsSliderBox', 'cms_slider_boxes_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'l_title' => 'L Title',
            'l_text' => 'L Text',
            'l_btn_text' => 'L Btn Text',
            'cms_slider_boxes_id' => 'Cms Slider Boxes',
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
        $criteria->compare('l_title', $this->l_title, true);
        $criteria->compare('l_text', $this->l_text, true);
        $criteria->compare('l_btn_text', $this->l_btn_text, true);
        $criteria->compare('cms_slider_boxes_id', $this->cms_slider_boxes_id);
        $criteria->compare('language_code', $this->language_code, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}