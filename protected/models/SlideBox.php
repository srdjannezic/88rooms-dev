<?php

/**
 * This is the model class for table "slide_boxes".
 *
 * The followings are the available columns in table 'slide_boxes':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $btn_text
 * @property string $url
 * @property integer $cms_slide_id
 *
 * The followings are the available model relations:
 * @property CmsSlides $cmsSlide
 */
class SlideBox extends Model {

    public function scopes() {
        return array(
            'ordered' => array(
                'order' => 't.ordr ASC',
            ),
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SlideBox the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'slide_boxes';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cms_slide_id', 'required'),
            array('cms_slide_id, ordr', 'numerical', 'integerOnly' => true),
            array('title, url', 'length', 'max' => 255),
            array('btn_text', 'length', 'max' => 40),
            array('text', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, text, btn_text, url, cms_slide_id, ordr', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cmsSlide' => array(self::BELONGS_TO, 'CmsSlides', 'cms_slide_id'),
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
            'cms_slide_id' => 'Cms Slide',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('btn_text', $this->btn_text, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('cms_slide_id', $this->cms_slide_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}