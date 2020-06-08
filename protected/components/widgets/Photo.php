<?php

/**
 * Description of ContactPhoto
 * @author daniel.stojilovic
 *
 * This is a widget that shows a photo of the contact entity
 * @property string $photo This is the PHOTO database field, containing the filename
 * of the photo without the path
 *
 */
class Photo extends CWidget {
    public $id;
    public $url;
    public $lightBoxUrl;
    public $position;
    public $cache=true;
    public $path = null;
    public $gallery = false;
    // controller action. Because contact and organization photos/logos can
    // appear in /view and /index pages, this variable will tell us what action
    // is currently running
    protected $action;
    public $model;
    public $field="image";
    public $w=50;
    public $h=50;
    public $lightBox;

    public function init() {
        if(!isset($this->model)) throw new Exception("Photo widget: 'model' is requred");
        $this->url= Utility::createUrl("/files/photo", array("id"=>$this->id,"model"=>$this->model,"field"=>$this->field,"lightBox" => false,"path"=>$this->path,"w" => $this->w,"h" => $this->h));
        $this->lightBoxUrl= Utility::createUrl("/files/photo", array("id"=>$this->id,"model"=>$this->model,"field"=>$this->field,"lightBox"=>true, "path" =>$this->path));
    }

    public function run() {
        $this->action= $this->getController()->getAction()->getId();
        if(!isset($this->position)) {
            if($this->action=="view") {
                //$this->position= "top left";
            }
            else {
                //$this->position= "top left";
            }
        }

        $this->render("photo");
    }
}

?>
