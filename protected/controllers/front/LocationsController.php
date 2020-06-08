<?php

/**
 * Description of CityOffer
 *
 * @author Nikola
 */
class LocationsController extends Controller {

    public function actionIndex() {
        $poi = PointOfInterest::model()->findAll();
        $this->render('index', array(
            'pois' => $poi,
        ));
    }

    public function actionView($slug) {
        $this->render('view', array(
            'model' => $this->loadModel($slug, TRUE),
        ));
    }

    public function loadModel($slug, $ml = false) {
        if ($ml) {
            $model = PointOfInterest::model()->multilang()->findByAttributes(array("slug" => $slug));
        } else {
            $model = PointOfInterest::model()->findByAttributes(array("slug" => $slug));
        }
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}