<?php

/**
 * This is the model class for table "cms_gallery_items".
 *
 * The followings are the available columns in table 'cms_gallery_items':
 * @property integer $id
 * @property integer $cms_media_id
 * @property integer $cms_gallery_id
 * @property integer $ordr
 *
 * The followings are the available model relations:
 * @property CmsGallery $cmsGallery
 * @property CmsMedia $cmsMedia
 */
class CmsGalleryItem extends Model {

    public function behaviors() {
        return array(
            'sortableModel' => array(
                'class' => 'ext.yiisortablemodel.behaviors.SortableCActiveRecordBehavior',
                'orderField' => 'ordr',
                'relation_field' => 'cms_gallery_id'
            )
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CmsGalleryItem the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cms_gallery_items';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cms_media_id, cms_gallery_id', 'required'),
            array('cms_media_id, cms_gallery_id, ordr', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, cms_media_id, cms_gallery_id, ordr', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cmsGallery' => array(self::BELONGS_TO, 'CmsGallery', 'cms_gallery_id'),
            'cmsMedia' => array(self::BELONGS_TO, 'CmsMedia', 'cms_media_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'cms_media_id' => 'Cms Media',
            'cms_gallery_id' => 'Cms Gallery',
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
        $criteria->compare('cms_media_id', $this->cms_media_id);
        $criteria->compare('cms_gallery_id', $this->cms_gallery_id);
        $criteria->compare('ordr', $this->ordr);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'ordr ASC',
                    ),
                ));
    }

}