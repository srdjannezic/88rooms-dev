<?php

class ConfigurationController extends BackEndController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {
        $model = $this->loadModel(1, true);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Configuration'])) {
            $model->attributes = $_POST['Configuration'];
            if ($model->save())
                $this->redirect(array('update', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $ml = false) {
        if ($ml) {
            $model = Configuration::model()->multilang()->findByPk((int) $id);
        } else {
            $model = Configuration::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'configuration-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
