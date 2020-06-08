<?php

/**
 * This is the model class for table "cms_box".
 *
 * The followings are the available columns in table 'cms_box':
 * @property integer $id
 * @property integer $cms_object_id
 * @property string $text
 * @property string $btn_text
 * @property string $url
 * @property integer $cms_media_id
 * @property integer $cms_block_id
 * @property string $title
 * @property integer $ordr
 *
 * The followings are the available model relations:
 * @property CmsBlock $cmsBlock
 * @property CmsObjects $cmsObject
 * @property CmsMedia $cmsMedia
 * @property CmsObjectCmsBlock[] $cmsObjectCmsBlocks
 */
class CmsBox extends Model {
    
    public $_blocks;
    
    public function behaviors() {
        return array(
            'ml' => array(
                'class' => 'application.behaviors.MultilingualBehavior',
                'langClassName' => 'CmsBoxLanguages',
                'langTableName' => 'cms_box_languages',
                'langForeignKey' => 'cms_box_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('title', 'text', 'btn_text'), //attributes of the model to be translated
                //'localizedPrefix' => 'l_',
                'languages' => CHtml::listData(Language::model()->findAll(), "code", "name"), // array of your translated languages. Example : array('fr' => 'Français', 'en' => 'English')
                'defaultLanguage' => Yii::app()->params['defaultLanguage'], //your main language. Example : 'fr'
            //'createScenario' => 'insert',
            //'localizedRelation' => 'i18nPost',
            //'multilangRelation' => 'multilangPost',
            //'forceOverwrite' => false,
            //'forceDelete' => true, 
            //'dynamicLangClass' => true, //Set to true if you don't want to create a 'PostLang.php' in your models folder
            ),
            'sortableModel' => array(
                'class' => 'ext.yiisortablemodel.behaviors.SortableCActiveRecordBehavior',
                'orderField' => 'ordr'
            )
        );
    }

    public function defaultScope() {
        return $this->ml->localizedCriteria();
    }

    protected function afterFind() {
        parent::afterFind();
        $blocks = $this->blocks;
        
        foreach ($blocks as $block) {
            $this->_blocks[] = $block->id;
        }
    }
    
    public function scopes() {
        return array(
            'visible' => array(
                'condition' => 'cmsBoxes.visible=1'
            )
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CmsBox the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cms_box';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cms_object_id, cms_media_id, cms_block_id, cms_menu_id, ordr, visible', 'numerical', 'integerOnly' => true),
            array('btn_text, title, type', 'length', 'max' => 255),
            array('url', 'length', 'max' => 300),
            array('text', 'safe'),
            array('_blocks', 'type', 'type' => 'array', 'allowEmpty' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, cms_object_id, text, btn_text, url, cms_media_id, cms_block_id, title, ordr, type, cms_menu_id, visible, _blocks', 'safe', 'on' => 'search'),
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
            'cmsObject' => array(self::BELONGS_TO, 'CmsObject', 'cms_object_id'),
            'cmsMedia' => array(self::BELONGS_TO, 'CmsMedia', 'cms_media_id'),
            'cmsMenu' => array(self::BELONGS_TO, 'Menu', 'cms_menu_id'),
            'cmsObjectCmsBlocks' => array(self::HAS_MANY, 'CmsObjectCmsBlock', 'cms_box_id'),
            'cmsBoxCmsBlocks' => array(self::HAS_MANY, 'CmsBlockCmsBox', 'cms_box_id'),
            'blocks' => array(self::HAS_MANY, 'CmsBlock', array('cms_block_id' => 'id'), 'through' => 'cmsBoxCmsBlocks'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'cms_object_id' => 'Page',
            'text' => 'Text',
            'btn_text' => 'Btn Text',
            'url' => 'Url',
            'cms_media_id' => 'Cms Media',
            'cms_block_id' => 'Cms Block',
            'cms_menu_id' => 'Cms Menu',
            'title' => 'Title',
            'ordr' => 'Ordr',
            'type' => 'Type',
            'visible' => 'Visible',
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
        $criteria->compare('cms_object_id', $this->cms_object_id);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('btn_text', $this->btn_text, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('cms_media_id', $this->cms_media_id);
        $criteria->compare('cms_block_id', $this->cms_block_id);
        $criteria->compare('cms_menu_id', $this->cms_menu_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('ordr', $this->ordr);

        return new CActiveDataProvider($this, array(
                    'criteria' => $this->ml->modifySearchCriteria($criteria),
                    'sort' => array(
                        'defaultOrder' => 'ordr ASC',
                    ),
                ));
    }

}