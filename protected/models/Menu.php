<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property MenuItem[] $menuItems
 */
class Menu extends Model {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Menu the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'menu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, menu_position', 'required'),
            array('name', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, menu_position', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'menuItems' => array(self::HAS_MANY, 'MenuItem', 'menu_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'menu_position' => 'Menu position'
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
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function formatMenu($position) {
        $model = $this->findByAttributes(array("menu_position" => $position));
        $data = array();
        foreach ($model->menuItems as $item) {
            $data[] = array(
                "label" => ($item->title ? $item->title : ($item->cms_object_id ? $item->cmsObject->title : "")),
                "url" => ($item->url ? $item->url :
                        ($item->cms_object_id ?
                                ($item->cmsObject->object_type == 'page' ?
                                        Utility::createUrl("page/index", array("slug" => $item->cmsObject->slug)) : Utility::createUrl("post", array("slug" => $item->cmsObject->slug))
                                ) : ""
                        )
                )
            );
        }

        return $data;
    }

}