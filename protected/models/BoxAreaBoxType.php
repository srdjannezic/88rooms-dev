<?php

/**
 * This is the model class for table "box_area_box_type".
 *
 * The followings are the available columns in table 'box_area_box_type':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $cms_object_id
 * @property integer $hotel_room_id
 * @property integer $menu_id
 * @property string $class
 * @property string $button_text
 * @property string $link
 */
class BoxAreaBoxType extends Model
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BoxAreaBoxType the static model class
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
		return 'box_area_box_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cms_object_id, hotel_room_id, menu_id', 'numerical', 'integerOnly'=>true),
			array('title, class, button_text, link', 'length', 'max'=>255),
			array('text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, text, cms_object_id, hotel_room_id, menu_id, class, button_text, link', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'text' => 'Text',
			'cms_object_id' => 'Cms Object',
			'hotel_room_id' => 'Hotel Room',
			'menu_id' => 'Menu',
			'class' => 'Class',
			'button_text' => 'Button Text',
			'link' => 'Link',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('cms_object_id',$this->cms_object_id);
		$criteria->compare('hotel_room_id',$this->hotel_room_id);
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('button_text',$this->button_text,true);
		$criteria->compare('link',$this->link,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}