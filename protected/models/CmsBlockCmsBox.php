<?php

/**
 * This is the model class for table "cms_block_cms_box".
 *
 * The followings are the available columns in table 'cms_block_cms_box':
 * @property integer $id
 * @property integer $cms_box_id
 * @property integer $cms_block_id
 * @property integer $ordr
 *
 * The followings are the available model relations:
 * @property CmsBlock $cmsBlock
 * @property CmsBox $cmsBox
 */
class CmsBlockCmsBox extends Model {

    public function behaviors() {
        return array(
            'sortableModel' => array(
                'class' => 'ext.yiisortablemodel.behaviors.SortableCActiveRecordBehavior',
                'orderField' => 'ordr',
                'relation_field' => 'cms_block_id'
            )
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CmsBlockCmsBox the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cms_block_cms_box';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cms_box_id, cms_block_id', 'required'),
            array('cms_box_id, cms_block_id, ordr', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, cms_box_id, cms_block_id, ordr', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cmsBlock' => array(self::BELONGS_TO, 'CmsBlock', 'cms_block_id'),
            'cmsBox' => array(self::BELONGS_TO, 'CmsBox', 'cms_box_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'cms_box_id' => 'Cms Box',
            'cms_block_id' => 'Cms Block',
            'ordr' => 'Ordr',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($searchArgument = null) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.        
        $criteria = Utility::getCriteria($searchArgument);

        $criteria->compare('id', $this->id);
        $criteria->compare('cms_box_id', $this->cms_box_id);
        $criteria->compare('cms_block_id', $this->cms_block_id);
        $criteria->compare('ordr', $this->ordr);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}