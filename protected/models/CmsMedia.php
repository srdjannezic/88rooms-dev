<?php

/**
 * This is the model class for table "cms_media".
 *
 * The followings are the available columns in table 'cms_media':
 * @property integer $id
 * @property integer $title
 * @property string $media_type
 * @property string $date_created
 *
 * The followings are the available model relations:
 * @property CmsGalleryItems[] $cmsGalleryItems
 * @property CmsObjects[] $cmsObjects
 */
class CmsMedia extends Model {

    public $_image_url;
    public $_thumb_url;
    public $_image_path;

    protected function afterFind() {
        parent::afterFind();

        $this->_image_url = Utility::getImageUrlByDate($this->date_created, '-') . $this->file;
        $this->_thumb_url = Utility::getImageUrlByDate($this->date_created, '-') . 'thumbs/' . $this->file;
        $this->_image_path = Utility::getImagePathByDate($this->date_created, '-') . $this->file;
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CmsMedia the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cms_media';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, date_created, file', 'required'),
            array('media_type', 'length', 'max' => 20),
            array('title, video_id', 'length', 'max' => 255),
            array('video_url', 'length', 'max' => 500),
            array('video_url', 'videoCheck', 'on' => 'addVideo'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, media_type, date_created, file, _image_url, _thumb_url, _image_path, video_url, video_id', 'safe', 'on' => 'search'),
        );
    }

    public function videoCheck($attribute, $params) {
        if ($this->$attribute) {
            $pattern_yt = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/";
            $pattern_vimeo = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/";

            if (!preg_match($pattern_yt, $this->$attribute) || !preg_match($pattern_vimeo, $this->$attribute))
                $this->addError($attribute, 'Video url must be youtube or vimeo video url!');
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cmsGalleryItems' => array(self::HAS_MANY, 'CmsGalleryItems', 'cms_media_id'),
            'cmsObjects' => array(self::HAS_MANY, 'CmsObjects', 'cms_media_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'media_type' => 'Media Type',
            'date_created' => 'Date Created',
            'file' => 'File',
            'video_url' => 'Video Url'
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
        $criteria->compare('title', $this->title);
        $criteria->compare('media_type', $this->media_type, true);
        $criteria->compare('date_created', $this->date_created, true);
        $criteria->compare('file', $this->file, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => 18,
                    ),
                    'sort' => array(
                        'defaultOrder' => 'id DESC',
                    ),
                ));
    }

}
