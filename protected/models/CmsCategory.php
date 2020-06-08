<?php

/**
 * This is the model class for table "cms_categories".
 *
 * The followings are the available columns in table 'cms_categories':
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $date_created
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property BackendUser $user
 * @property CmsObjectsCmsCategories[] $cmsObjectsCmsCategories
 */
class CmsCategory extends Model {

    private static $catTree = array();

    public function behaviors() {
        return array(
            'ml' => array(
                'class' => 'application.behaviors.MultilingualBehavior',
                'langClassName' => 'CmsCategoryLanguage',
                'langTableName' => 'cms_category_languages',
                'langForeignKey' => 'cms_category_id',
                'langField' => 'language_code',
                'localizedAttributes' => array('name'), //attributes of the model to be translated
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
        );
    }

    protected function afterValidate() {
        if ($this->isNewRecord && $this->slug == '') {
            $slug = Helper::generateSlug($this->name);
            $i = 0;
            do {
                $slug_new = $slug . (($i > 0) ? '-' . $i : '');
                $i++;
            } while ($this->exists("slug=:slug", array(":slug" => $slug_new)));
            $this->slug = $slug_new;
        }
    }

    public function defaultScope() {
        return $this->ml->localizedCriteria();
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CmsCategory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cms_categories';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, date_created', 'required'),
            array('user_id, category_parent_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('slug', 'length', 'max' => 200),
            array('slug', 'unique'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, slug, date_created, user_id, category_parent_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'BackendUser', 'user_id'),
            'cmsObjectsCmsCategories' => array(self::HAS_MANY, 'CmsObjectsCmsCategories', 'cms_category_id'),
            'childs' => array(self::HAS_MANY, 'CmsCategory', 'category_parent_id'),
            'cmsCategoryLanguages' => array(self::HAS_MANY, 'CmsCategory', 'cms_category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'date_created' => 'Date Created',
            'user_id' => 'User',
            'category_parent_id' => 'Parent category id'
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
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('date_created', $this->date_created, true);
        $criteria->compare('user_id', $this->user_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public static function getCategoryTree() {
        if (empty(self::$catTree)) {
            $rows = CmsCategory::model()->findAll('category_parent_id IS NULL');

            foreach ($rows as $item) {
                self::$catTree[] = self::getCategoryItems($item);
            }
        }

        return self::$catTree;
    }

    public static function getListTreeView() {
        if (empty(self::$catTree)) {
            self::getCategoryTree();
        }

        return self::visualTree(self::$catTree, 0);
    }

    private static function visualTree($catTree, $level) {
        $res = array();

        foreach ($catTree as $item) {
            $res[$item['id']] = '' . str_pad('', $level * 2, '-') . ' ' . $item['label'];
            if (isset($item['items'])) {

                $res_iter = self::visualTree($item['items'], $level + 1);

                foreach ($res_iter as $key => $val) {
                    $res[$key] = $val;
                }
            }
        }

        return $res;
    }

    private static function getCategoryItems($modelRow) {

        if (!$modelRow)
            return;

        if (isset($modelRow->childs)) {
            $chump = self::getCategoryItems($modelRow->childs);
            if ($chump != null)
                $res = array('id' => $modelRow->id, 'label' => $modelRow->name, 'items' => $chump);
            else
                $res = array('id' => $modelRow->id, 'label' => $modelRow->name);
            return $res;
        } else {

            if (is_array($modelRow)) {
                $arr = array();
                foreach ($modelRow as $leaves) {
                    $arr[] = self::getCategoryItems($leaves);
                }
                return $arr;
            } else {
                return array('id' => $modelRow->id, 'label' => ($modelRow->name));
            }
        }
    }

}
