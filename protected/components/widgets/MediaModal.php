<?php

/**
 * Description of MediaModal
 *
 * @author Nikola
 */
class MediaModal extends CWidget {

    public $id;
    public $model;
    public $field = "cms_media_id";
    public $url;
    public $type = ""; // grid or list
    public $updateCont = "medias";

    public function run() {
        $model = new CmsMedia();
        $this->render('mediaModal', array("model" => $model));
    }

}