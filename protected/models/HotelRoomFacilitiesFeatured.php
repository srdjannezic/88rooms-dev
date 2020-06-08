<?php

/**
 * This is the model class for table "hotel_room_facilities_featured".
 *
 * The followings are the available columns in table 'hotel_room_facilities_featured':
 * @property integer $id
 * @property integer $hotel_room_id
 * @property integer $hotel_room_facility_id
 * @property integer $ordr
 *
 * The followings are the available model relations:
 * @property HotelFacilities $hotelRoomFacility
 * @property HotelRoom $hotelRoom
 */
class HotelRoomFacilitiesFeatured extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HotelRoomFacilitiesFeatured the static model class
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
		return 'hotel_room_facilities_featured';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hotel_room_id, hotel_room_facility_id', 'required'),
			array('hotel_room_id, hotel_room_facility_id, ordr', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, hotel_room_id, hotel_room_facility_id, ordr', 'safe', 'on'=>'search'),
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
			'hotelRoomFacility' => array(self::BELONGS_TO, 'HotelFacilities', 'hotel_room_facility_id'),
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
			'hotel_room_id' => 'Hotel Room',
			'hotel_room_facility_id' => 'Hotel Room Facility',
			'ordr' => 'Ordr',
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
		$criteria->compare('hotel_room_id',$this->hotel_room_id);
		$criteria->compare('hotel_room_facility_id',$this->hotel_room_facility_id);
		$criteria->compare('ordr',$this->ordr);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}