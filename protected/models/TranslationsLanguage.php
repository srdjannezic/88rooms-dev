<?php

/**
 * This is the model class for table "translations_language".
 *
 * The followings are the available columns in table 'translations_language':
 * @property integer $id
 * @property string $l_word
 * @property string $language_code
 * @property integer $translation_id
 *
 * The followings are the available model relations:
 * @property Translations $translation
 */
class TranslationsLanguage extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TranslationsLanguage the static model class
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
		return 'translations_language';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_word, language_code, translation_id', 'required'),
			array('translation_id', 'numerical', 'integerOnly'=>true),
			array('l_word', 'length', 'max'=>300),
			array('language_code', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, l_word, language_code, translation_id', 'safe', 'on'=>'search'),
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
			'translation' => array(self::BELONGS_TO, 'Translations', 'translation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'l_word' => 'L Word',
			'language_code' => 'Language Code',
			'translation_id' => 'Translation',
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
		$criteria->compare('l_word',$this->l_word,true);
		$criteria->compare('language_code',$this->language_code,true);
		$criteria->compare('translation_id',$this->translation_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}