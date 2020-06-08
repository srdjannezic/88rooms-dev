<?php

/**
 * This is the model class for table "cms_object_languages".
 *
 * The followings are the available columns in table 'cms_object_languages':
 * @property integer $id
 * @property integer $language_id
 * @property integer $cms_object_id
 * @property string $l_title
 * @property string $l_text
 *
 * The followings are the available model relations:
 * @property CmsObjects $cmsObject
 * @property Languages $language
 */
class CmsObjectLanguage extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CmsObjectLanguage the static model class
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
		return 'cms_object_languages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('language_id, cms_object_id, l_title, l_text', 'required'),
			array('language_id, cms_object_id', 'numerical', 'integerOnly'=>true),
			array('l_title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, language_id, cms_object_id, l_title, l_text', 'safe', 'on'=>'search'),
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
			'cmsObject' => array(self::BELONGS_TO, 'CmsObjects', 'cms_object_id'),
			'language' => array(self::BELONGS_TO, 'Languages', 'language_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'language_id' => 'Language',
			'cms_object_id' => 'Cms Object',
			'l_title' => 'L Title',
			'l_text' => 'L Text',
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
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('cms_object_id',$this->cms_object_id);
		$criteria->compare('l_title',$this->l_title,true);
		$criteria->compare('l_text',$this->l_text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}