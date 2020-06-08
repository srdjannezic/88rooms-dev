<?php

/**
 * This is the model class for table "special_offers_languages".
 *
 * The followings are the available columns in table 'special_offers_languages':
 * @property integer $id
 * @property string $l_title
 * @property string $l_text
 * @property integer $special_offer_id
 * @property string $language_code
 *
 * The followings are the available model relations:
 * @property SpecialOffers $specialOffer
 */
class SpecialOffersLanguage extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpecialOffersLanguage the static model class
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
		return 'special_offers_languages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_title, l_text, special_offer_id, language_code', 'required'),
			array('special_offer_id', 'numerical', 'integerOnly'=>true),
			array('l_title', 'length', 'max'=>255),
			array('language_code', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, l_title, l_text, special_offer_id, language_code', 'safe', 'on'=>'search'),
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
			'specialOffer' => array(self::BELONGS_TO, 'SpecialOffers', 'special_offer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'l_title' => 'L Title',
			'l_text' => 'L Text',
			'special_offer_id' => 'Special Offer',
			'language_code' => 'Language Code',
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
		$criteria->compare('l_title',$this->l_title,true);
		$criteria->compare('l_text',$this->l_text,true);
		$criteria->compare('special_offer_id',$this->special_offer_id);
		$criteria->compare('language_code',$this->language_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}