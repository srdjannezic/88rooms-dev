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
class ArticlePhoto extends CWidget {
    public $id;
    public $url;
    public $position;
    // controller action. Because contact and organization photos/logos can 
    // appear in /view and /index pages, this variable will tell us what action
    // is currently running
    protected $action;
    
    public function init() {
        $this->url= Yii::app()->createUrl("/files/articlePhoto", array("id"=>$this->id));
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
        
        $this->render("articlePhoto");
    }
}

?>
