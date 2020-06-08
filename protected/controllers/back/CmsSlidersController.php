<?php

class CmsSlidersController extends BackEndController {

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
        $box = new CmsSliderBox;

        $criteria = new CDbCriteria();
        $criteria->compare("cms_slider_id", $id);


        //$slides = CmsSlide::model()->findAll($criteria);
        //$data = array();

        /* foreach ($slides as $slide) {
          $data[$slide->cms_media_id] = $slide->cmsMedia->_thumb_url;
          } */

        $this->render('view', array(
            'slides' => CmsSlide::model()->search($criteria),
            'model' => $this->loadModel($id),
            'box' => $box,
            'boxes' => CmsSliderBox::model()->search($criteria)
        ));
    }

    public function actionAddBox($id) {
        $model = new CmsSliderBox();
        if (isset($_POST['CmsSliderBox'])) {
            $model->cms_slider_id = $id;
            $model->attributes = $_POST['CmsSliderBox'];
            if ($model->save()) {
                $data = array("error" => false);
            }

            echo json_encode($data);
        }
    }

    public function actionRemoveBox($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            CmsSliderBox::model()->findByPk($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionRemoveSlide($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            CmsSlide::model()->findByPk($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionUpdateSlides($id) {
        $slider = $this->loadModel($id);
        if ($_POST) {
            $slides = $slider->cmsSlides;

            foreach ($slides as $slide) {

                if (!in_array($slide->id, $_POST['SlidesIds'])) {
                    CmsSlide::model()->deleteByPk($slide->id);
                }
            }
            //Utility::dump($_POST);
            if ($_POST['CmsSlide']) {
                $i = 0;
                foreach ($_POST['CmsSlide'] as $key => $slide) {

                    if (!isset($slide['slide_id'])) {
                        $model = new CmsSlide();
                        $model->cms_media_id = $slide['cms_media_id'];
                    } else {
                        $model = CmsSlide::model()->findByPk($slide['slide_id']);
                    }
                    $model->cms_slider_id = $id;
                    $model->ordr = $i;
                    $model->save();

                    $i++;
                }
            }

            $this->redirect(array('view', 'id' => $id));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new CmsSlider;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CmsSlider'])) {
            $model->attributes = $_POST['CmsSlider'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CmsSlider'])) {
            $model->attributes = $_POST['CmsSlider'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
        $dataProvider = new CActiveDataProvider('CmsSlider');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new CmsSlider('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['CmsSlider']))
            $model->attributes = $_GET['CmsSlider'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = CmsSlider::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cms-slider-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
