<?php

/**
 * Description of SpecialOffers
 *
 * @author Nikola
 */
class SpecialOffersController extends Controller {

    public function actionIndex() {

        $this->render('index', array(
            'dataProvider' => SpecialOffer::model()->search(),
        ));
    }

    public function actionView($slug) {
        $model = $this->loadModel($slug, TRUE);
        $description = (!empty($model->meta_description) ? $model->meta_description : $model->excerpt);
        $title = (!empty($model->meta_title) ? $model->meta_title : $model->title);
        $keywords = $model->meta_keywords;

        Yii::app()->clientScript->registerMetaTag($model->cmsMedia->_image_url, null, null, array('property' => "og:image"));
        Yii::app()->clientScript->registerMetaTag(Yii::app()->name . ' | ' . $title, null, null, array('property' => "og:title"));
        Yii::app()->clientScript->registerMetaTag($this->createAbsoluteUrl("specialOffers/view", array("slug" => $model->slug)), null, null, array('property' => "og:url"));
        if (!empty($description)) {
            Yii::app()->clientScript->registerMetaTag(strip_tags($description), null, null, array('property' => "og:description"));
            Yii::app()->clientScript->registerMetaTag(strip_tags($description), null, null, array('property' => "description"));
        }
        if (!empty($keywords)) {
            Yii::app()->clientScript->registerMetaTag(strip_tags($keywords), null, null, array('property' => "keywords"));
        }
        $this->pageTitle = Yii::app()->name . ' | ' . $title;

        $this->render('view', array(
            'model' => $this->loadModel($slug, TRUE),
        ));
    }

    public function loadModel($slug, $ml = false) {
        $model = SpecialOffer::model()->findByAttributes(array("slug" => $slug));
        if ($model === null || $model->visible == 0)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}