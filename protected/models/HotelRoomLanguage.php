<?php

/**
 * This is the model class for table "hotel_room_languages".
 *
 * The followings are the available columns in table 'hotel_room_languages':
 * @property integer $id
 * @property string $l_name
 * @property string $l_description
 * @property integer $hotel_room_id
 *
 * The followings are the available model relations:
 * @property HotelRoom $hotelRoom
 */
class HotelRoomLanguage extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HotelRoomLanguage the static model class
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
		return 'hotel_room_languages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_name, l_description, hotel_room_id', 'required'),
			array('hotel_room_id', 'numerical', 'integerOnly'=>true),
			array('l_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, l_name, l_description, hotel_room_id', 'safe', 'on'=>'search'),
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
			'hotelRoom' => array(self::BELONGS_TO, 'HotelRoom', 'hotel_room_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'l_name' => 'L Name',
			'l_description' => 'L Description',
			'hotel_room_id' => 'Hotel Room',
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
		$criteria->compare('l_name',$this->l_name,true);
		$criteria->compare('l_description',$this->l_description,true);
		$criteria->compare('hotel_room_id',$this->hotel_room_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}