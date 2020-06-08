<?php

class CmsObjectsController extends BackEndController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($type) {
        $model = new CmsObject;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        //Utility::dump($_POST['CmsObject']);
        $model->object_type = $type;
        if (isset($_POST['CmsObject'])) {
            $model->attributes = $_POST['CmsObject'];
            $model->user_id = Yii::app()->user->id;
            if ($model->save()) {
                if ($model->_categories) {
                    $valid = false;
                    foreach ($model->_categories as $category) {
                        $cms_object_category_model = new CmsObjectsCmsCategory();
                        $cms_object_category_model->cms_object_id = $model->id;
                        $cms_object_category_model->cms_category_id = $category;
                        if ($cms_object_category_model->save())
                            $valid = true;
                    }
                }
                if ($model->_blocks) {
                    $valid = false;
                    foreach ($model->_blocks as $block) {
                        $cms_object_cms_block = new CmsObjectCmsBlock();
                        $cms_object_cms_block->cms_object_id = $model->id;
                        $cms_object_cms_block->cms_block_id = $block;
                        if ($cms_object_cms_block->save())
                            $valid = true;
                    }
                }
                Yii::app()->user->setFlash('RightsSuccess', 'Created successfully.');
                $this->redirect(array('update', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id, true);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CmsObject'])) {
            $model->attributes = $_POST['CmsObject'];

            if ($model->save()) {
                $model_cms_categories = CmsObjectsCmsCategory::model()->deleteAll("cms_object_id=:ID", array(":ID" => $model->id));
                if ($model->_categories) {
                    $valid = false;
                    foreach ($model->_categories as $category) {
                        $cms_object_category_model = new CmsObjectsCmsCategory();
                        $cms_object_category_model->cms_object_id = $model->id;
                        $cms_object_category_model->cms_category_id = $category;
                        if ($cms_object_category_model->save()) {
                            $valid = true;
                        } else {
                            
                        }
                    }
                }
                $model_cms_blocks = CmsObjectCmsBlock::model()->deleteAll("cms_object_id=:ID", array(":ID" => $model->id));
                if ($model->_blocks) {
                    $valid = false;
                    foreach ($model->_blocks as $block) {
                        $cms_object_cms_block = new CmsObjectCmsBlock();
                        $cms_object_cms_block->cms_object_id = $model->id;
                        $cms_object_cms_block->cms_block_id = $block;
                        if ($cms_object_cms_block->save())
                            $valid = true;
                    }
                }
                Yii::app()->user->setFlash('RightsSuccess', 'Saved successfully.');
                $this->redirect(array('update', 'id' => $model->id));
            }else {
                //Utility::dump($model->getErrors());
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('CmsObject');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($type) {
        $model = new CmsObject('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['CmsObject']))
            $model->attributes = $_GET['CmsObject'];

        $criteria = new CDbCriteria();
        $criteria->compare("object_type", $type);
        $dataProvider = $model->search($criteria);

        $this->render('admin', array(
            'model' => $model,
            'dataProvider' => $dataProvider
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $ml = false) {

        if ($ml) {
            $model = CmsObject::model()->multilang()->findByPk((int) $id);
        } else {
            $model = CmsObject::model()->findByPk((int) $id);
        }
        if ($model === null)
            throw new CHttpException(404, 'The requested post does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cms-object-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
