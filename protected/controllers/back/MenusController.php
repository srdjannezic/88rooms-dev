<?php

class MenusController extends BackEndController {

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
        $menuItem = new MenuItem();
        if ($_POST) {
            $menu_items_data = $_POST['MenuItem'];
            $d = MenuItem::model()->deleteAll("menu_id=:menu_id", array(":menu_id" => $id));
            $i = 0;
            foreach ($menu_items_data as $menu_item) {
                $model = new MenuItem;
                $model->menu_id = $id;
                $model->attributes = $menu_item;
                $model->ordr = $i;
                $model->save();

                $i++;
            }
        }

        $criteria = new CDbCriteria();
        $criteria->compare("menu_id", $id);

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'menuItem' => $menuItem,
            'menuItems' => MenuItem::model()->multilang()->findAll($criteria)
        ));
    }

    public function actionAddMenuItem() {
        $model = new MenuItem();
        $model->attributes = $_POST['MenuItem'];

        echo $this->renderPartial('//general/menu-item', array(
            'model' => $model,
            'i' => $_POST['i']
                ), true);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Menu;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Menu'])) {
            $model->attributes = $_POST['Menu'];
            if ($model->save()) {
                Yii::app()->user->setFlash('RightsSuccess', 'Created successfully.');
                $this->redirect(array('view', 'id' => $model->id));
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
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Menu'])) {
            $model->attributes = $_POST['Menu'];
            if ($model->save()) {
                Yii::app()->user->setFlash('RightsSuccess', 'Saved successfully.');
                $this->redirect(array('view', 'id' => $model->id));
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
        $dataProvider = new CActiveDataProvider('Menu');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Menu('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Menu']))
            $model->attributes = $_GET['Menu'];

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
        $model = Menu::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'menu-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
