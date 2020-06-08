<?php

/**
 * This is the model class for table "cms_box_languages".
 *
 * The followings are the available columns in table 'cms_box_languages':
 * @property integer $id
 * @property string $l_text
 * @property string $l_title
 * @property integer $cms_box_id
 * @property string $language_code
 * @property string $l_btn_text
 *
 * The followings are the available model relations:
 * @property CmsBlock $cmsBox
 */
class CmsBoxLanguage extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CmsBoxLanguage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_box_languages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_text, l_title, cms_box_id, language_code, l_btn_text', 'required'),
			array('cms_box_id', 'numerical', 'integerOnly'=>true),
			array('l_title, l_btn_text', 'length', 'max'=>255),
			array('language_code', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, l_text, l_title, cms_box_id, language_code, l_btn_text', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cmsBox' => array(self::BELONGS_TO, 'CmsBlock', 'cms_box_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'l_text' => 'L Text',
			'l_title' => 'L Title',
			'cms_box_id' => 'Cms Box',
			'language_code' => 'Language Code',
			'l_btn_text' => 'L Btn Text',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('l_text',$this->l_text,true);
		$criteria->compare('l_title',$this->l_title,true);
		$criteria->compare('cms_box_id',$this->cms_box_id);
		$criteria->compare('language_code',$this->language_code,true);
		$criteria->compare('l_btn_text',$this->l_btn_text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}