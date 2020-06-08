<?php

/**
 * This is the model class for table "cms_objects".
 *
 * The followings are the available columns in table 'cms_objects':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $date_created
 * @property integer $object_type
 * @property integer $cms_media_id
 * @property integer $user_id
 * @property string $slug
 *
 * The followings are the available model relations:
 * @property CmsMedia $cmsMedia
 * @property BackendUser $user
 * @property CmsObjectsCmsCategories[] $cmsObjectsCmsCategories
 */
class CmsObject extends Model {

    public $_categories;
    public $_blocks;
    public $_categories_selected;
    public $listCategories;
    public $is_home;
    public $_excerpt;

    public function behaviors() {
        return array(
            'ml' => array(
                'class' => 'application.behaviors.MultilingualBehavior',
                'langClassName' => 'CmsObjectLanguage',
                'langTableName' => 'cms_object_languages',
                'langForeignKey' => 'cms_object_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('title', 'text', 'excerpt', 'meta_title', 'meta_description', 'meta_keywords'), //attributes of the model to be translated
                //'localizedPrefix' => 'l_',
                'languages' => CHtml::listData(Language::model()->findAll(), "code", "name"), // array of your translated languages. Example : array('fr' => 'Français', 'en' => 'English')
                'defaultLanguage' => Yii::app()->params['defaultLanguage'], //your main language. Example : 'fr'
            //'createScenario' => 'insert',
            //'localizedRelation' => 'cmsObjectLanguages',
            //'multilangRelation' => 'cmsObjectLanguages',
            //'forceOverwrite' => false,
            //'forceDelete' => true, 
            //'dynamicLangClass' => true, //Set to true if you don't want to create a 'PostLang.php' in your models folder
            ),
        );
    }

    public function scopes() {
        return array(
            'pages' => array(
                'condition' => 'object_type="' . CmsObjectTypes::CMS_PAGE . '"',
            ),
            'posts' => array(
                'condition' => 'object_type="' . CmsObjectTypes::CMS_POST . '"',
            ),
            'recently' => array(
                'order' => 'date_created DESC',
                'limit' => 5,
            ),
            'visible' => array(
                'condition' => 'visible=1'
            )
        );
    }

    public function defaultScope() {
        return $this->ml->localizedCriteria();
    }

    protected function afterValidate() {
        $this->date_created = ($this->date_created) ? date("Y-m-d", strtotime($this->date_created)) : date("Y-m-d", strtotime("NOW"));
        if ($this->slug == '') {
            $slug = Helper::generateSlug($this->title);
            $i = 0;
            do {
                $slug_new = $slug . (($i > 0) ? '-' . $i : '');
                $i++;
            } while ($this->exists("slug=:slug", array(":slug" => $slug_new)));
            $this->slug = $slug_new;
        }
    }

    protected function afterFind() {
        parent::afterFind();
        $categories = $this->categories;

        foreach ($categories as $category) {
            $this->_categories[] = $category->id;
        }

        foreach ($this->blocks as $block) {
            $this->_blocks[] = $block->id;
        }
        $this->is_home = (Configuration::model()->getConfig()->home_page == $this->id) ? true : false;
        $this->_excerpt = !empty($this->excerpt) ? $this->excerpt : Utility::excerpt($this->text, 400);
        //Utility::dump($this->text);
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CmsObject the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cms_objects';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required'),
            array('cms_media_id, user_id, parent_id, cms_object_template_id, visible', 'numerical', 'integerOnly' => true),
            array('title, date_created, meta_keywords', 'length', 'max' => 255),
            array('meta_description', 'length', 'max' => 160),
            array('meta_title', 'length', 'max' => 60),
            array('slug', 'length', 'max' => 200),
            array('object_type', 'length', 'max' => 30),
            array('slug', 'unique'),
            array('text', 'safe'),
            array('excerpt, _excerpt', 'safe'),
            //array('date_created', 'date'),
            array('_categories, _blocks', 'type', 'type' => 'array', 'allowEmpty' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, text, date_created, object_type, cms_media_id, user_id, slug, excerpt, _categories, _blocks, _categories_selected, parent_id, cms_object_template_id, visible, _excerpt, meta_keywords, meta_title, meta_description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cmsMedia' => array(self::BELONGS_TO, 'CmsMedia', 'cms_media_id'),
            'parent' => array(self::BELONGS_TO, 'CmsObject', 'parent_id'),
            'childs' => array(self::HAS_MANY, 'CmsObject', 'parent_id'),
            'template' => array(self::BELONGS_TO, 'CmsObjectTemplate', 'cms_object_template_id'),
            'user' => array(self::BELONGS_TO, 'BackendUser', 'user_id'),
            'cmsObjectLanguages' => array(self::HAS_MANY, 'CmsObjectLanguages', 'cms_object_id'),
            'cmsObjectsCmsCategories' => array(self::HAS_MANY, 'CmsObjectsCmsCategory', 'cms_object_id'),
            'categories' => array(self::HAS_MANY, 'CmsCategory', array('cms_category_id' => 'id'), 'through' => 'cmsObjectsCmsCategories'),
            'blocks' => array(self::MANY_MANY, 'CmsBlock', 'cms_object_cms_block(cms_object_id,cms_block_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'date_created' => 'Date Created',
            'object_type' => 'Object Type',
            'cms_media_id' => 'Cms Media',
            'user_id' => 'User',
            'slug' => 'Slug',
            'excerpt' => 'Excerpt',
            'parent' => 'Parent',
            'cms_object_template_id' => 'Template',
            'visible' => 'Visibility',
            '_categories' => 'Categories'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($searchArgument = null, $pageSize = 10) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.        
        $criteria = Utility::getCriteria($searchArgument);

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('date_created', $this->date_created, true);
        $criteria->compare('object_type', $this->object_type);
        $criteria->compare('cms_media_id', $this->cms_media_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('visible', $this->visible, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $this->ml->modifySearchCriteria($criteria),
                    "sort" => array(
                        'defaultOrder' => "t.date_created DESC",
                    ),
                    "pagination" => array(
                        'pageSize' => $pageSize,
                    ),
                ));
    }

}