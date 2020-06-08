<?php

/**
 * Description of News
 *
 * @author Nikola
 */
class PageController extends Controller {

    public function actionIndex($slug) {
        $model = $this->loadModel($slug, TRUE);
        $description = (!empty($model->meta_description) ? $model->meta_description : $model->excerpt);
        $title = (!empty($model->meta_title) ? $model->meta_title : $model->title);
        $keywords = $model->meta_keywords;

        $image = ($model->cms_media_id) ? $model->cmsMedia->_image_url : $this->createAbsoluteUrl(Yii::app()->theme->baseUrl . "/assets/images/88_logo.gif");

        Yii::app()->clientScript->registerMetaTag($image, null, null, array('property' => "og:image"));
        Yii::app()->clientScript->registerMetaTag($this->createAbsoluteUrl("page/index", array("slug" => $model->slug)), null, null, array('property' => "og:url"));
        Yii::app()->clientScript->registerMetaTag(Yii::app()->name . ' | ' . $title, null, null, array('property' => "og:title"));

        if (!empty($description)) {
            Yii::app()->clientScript->registerMetaTag(strip_tags($description), null, null, array('property' => "og:description"));
            Yii::app()->clientScript->registerMetaTag(strip_tags($description), null, null, array('property' => "description"));
        }
        if (!empty($keywords)) {
            Yii::app()->clientScript->registerMetaTag(strip_tags($keywords), null, null, array('property' => "keywords"));
        }
        $this->pageTitle = Yii::app()->name . ' | ' . $title;
        $this->render("view", array(
            'model' => $model,
        ));
    }

    public function loadModel($slug, $ml = false) {
        $model = CmsObject::model()->findByAttributes(array("slug" => $slug, 'object_type' => CmsObjectTypes::CMS_PAGE));

        if ($model === null || $model->visible == 0)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}