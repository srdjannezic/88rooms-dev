<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxController
 *
 * @author Nikola
 */
class AjaxController extends BackEndController {

    public function actionMediaCreate($gallery_id = NULL) {
        $date = date("Y/m/d");
        $model = new CmsMedia;
        $model->date_created = $date;

        $file = CUploadedFile::getInstanceByName('file');
        $name = Utility::create_filename($file->name);
        $newName = $name . '.' . CFileHelper::getExtension($file->name);
        $model->media_type = CFileHelper::getMimeTypeByExtension($file->name);
        $model->file = $newName;
        $model->title = $name;
        $folder = Utility::createUploadFolder($date);
        if ($folder):
            if ($model->save()) {
                if (!empty($gallery_id)) {
                    $gallery = new CmsGalleryItem();
                    $gallery->cms_gallery_id = $gallery_id;
                    $gallery->cms_media_id = $model->id;
                    $gallery->save();
                }
                $file->saveAs($folder . $newName);
                Utility::resizeImg($folder . $newName, 336, 250, $folder . 'thumbs/' . $newName);
                if (isset($_GET['attr']) && $_GET['attr'] == 'text') {
                    $data = array(
                        'filelink' => Utility::getImageUrlByDate($model->date_created, '-') . $model->file,
                        'filename' => $newName,
                    );
                    echo CJSON::encode($data);
                    exit;
                }
            } else {
                echo json_encode($model->getErrors());
            }
        endif;
    }

    public function actionVideoCreate() {
        $model = new CmsMedia();

        if (isset($_POST['CmsMedia'])) {
            $date = date("Y/m/d");

            $model->attributes = $_POST['CmsMedia'];
            $data = Utility::getVideoDetails($model->video_url);
            $folder = Utility::createUploadFolder($date);
            //Utility::dump($model->attributes);
            $img_content = file_get_contents($data['thumbnail']);

            $name = Utility::create_filename($data['thumbnail']);

            $newName = $name . '.' . CFileHelper::getExtension($data['thumbnail']);
            $folder = Utility::createUploadFolder($date);

            if ($folder):
                file_put_contents($folder . $newName, $img_content);
                Utility::resizeImg($folder . $newName, 336, 250, $folder . 'thumbs/' . $newName);
            endif;

            $model->file = $newName;
            $model->title = $data['title'];
            $model->media_type = 'video/' . $data['provider'];
            $model->video_url = $data['video'];
            $model->date_created = $date;
            $model->video_id = $data['video_id'];

            try {
                $error = CActiveForm::validate($model);

                if ($error == '[]')
                    $model->save();
                else
                //Return messages from form validation
                    echo $error;
            } catch (Exception $e) {
                //Return messages from try/catch
                echo CJSON::encode(array(
                    'status' => 'error',
                    'msg' => $e->getMessage()
                ));
            }
        }
    }

    public function actionAddGalleryItem($id) {

        if ($_POST) {
            $gallery = new CmsGalleryItem();
            $gallery->cms_gallery_id = $id;
            $gallery->cms_media_id = $_POST['cms_media_id'];
            if ($gallery->save()) {
                echo json_encode(array("error" => false));
            }
        }
    }

    public function actionAddSliderItem($id) {
        if ($_POST) {
            $slide = new CmsSlide();
            $slide->cms_slider_id = $id;
            $slide->cms_media_id = $_POST['cms_media_id'];
            if ($slide->save()) {
                echo json_encode(array("error" => false));
            } else {
                var_dump($slide->getErrors());
            }
        }
    }

    public function actionImageList() {
        $criteria = new CDbCriteria();
        $criteria->order = 'id DESC';
        $model = CmsMedia::model()->findAll($criteria);

        $data = array();
        foreach ($model as $item) {
            $data[] = array(
                "thumb" => $item->_thumb_url,
                "image" => $item->_image_url,
            );
        }

        echo json_encode($data);
    }

}
