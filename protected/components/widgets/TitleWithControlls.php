<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TitleWithControlls
 *
 * @author daniel.stojilovic
 */
class TitleWithControlls extends CrudControlls {
    public $title;
    
    public function run() {
        $this->render("titleWithControlls");
    }
    
    public function init() {
        if(!isset($this->id)) {
            $this->id= $_GET['id'];
        }
        
        $this->allowedButtons= array(
            CrudButtons::create,
            CrudButtons::view,
            CrudButtons::update,
            CrudButtons::delete,
            CrudButtons::listEntries,
            CrudButtons::admin,
            CrudButtons::exportPdf,
            CrudButtons::exportDocumentPdf
        );
        
        $this->buttonsRequiringId= array(
            CrudButtons::view,
            CrudButtons::update,
            CrudButtons::delete,
            CrudButtons::exportPdf,
            CrudButtons::exportDocumentPdf
        );
        
        $this->defaultButtons= array(
            "create"=>array(
                CrudButtons::listEntries, 
                CrudButtons::admin
            ),
            "view"=>array(
                CrudButtons::update,
                CrudButtons::delete
            ),
            "update"=>array(
                CrudButtons::view,
                CrudButtons::delete
            ),
            "index"=> array( // index (list entries) page
                CrudButtons::create, 
                CrudButtons::admin
            ),
            "admin"=>array(
                CrudButtons::create, 
                CrudButtons::listEntries
            ),
        );
        
        // current running action
        $action= $this->getController()->getAction()->getId();
        if(!in_array($action, array("index", "update", "view", "admin", "create"))) {
            $action= "view";
        }
        
        if(!isset($this->title)) {
            $this->title= $this->splitAndCapitalize($this->getController()->getId(), false);
            
            switch($action) {
                case "index" : $this->title= $this->title."s"; break;
                case "create": 
                    $vowels= array("a", "o", "e", "i", "u");
                    if(in_array(strtolower($this->title[0]), $vowels)) {
                        $this->title= "Create an ".$this->title;
                    }
                    else {
                        $this->title= "Create a ".$this->title;
                    }
                    break;
                case "view": $this->title= $this->title." #$this->id"; break;
                case "update": $this->title= "Update ".$this->title." #$this->id"; break;
                case "admin": $this->title= "Manage ".$this->title."s"; break;
                default: $this->title= $this->title." #$this->id"; break;
            }
        }
        
        if(!isset($this->routeBase)) {      
            $this->routeBase= $this->getController()->getId();
        }
          
        if(!isset($this->buttons)) {
            $this->buttons= $this->defaultButtons[$action];
        }
    }
    
    protected function renderButton($type) {       
        $base= Yii::app()->baseUrl;
        $tooltip= ucfirst($type);
        if($type==CrudButtons::create) {
            $tooltip= "Add new";
        }
        elseif($type==CrudButtons::admin) {
            $tooltip= "Manage";
        }
        elseif($type==CrudButtons::listEntries) {
            $tooltip= "Browse";
        }
        elseif($type==CrudButtons::exportPdf) {
            $tooltip= "Export PDF";
        }
        elseif($type==CrudButtons::exportDocumentPdf) {
            $tooltip= "Export Document";
        }
        
        $urlType= $type;
        if($type=="list") {
            $urlType= "";
        }
        elseif($type==CrudButtons::exportPdf) {
            $urlType= $this->getController()->getAction()->getId()."&amp;export=pdf";
        }
        
        if($type==CrudButtons::exportDocumentPdf) {     
            if(isset($this->model)) { // we need the model to get the document_id
                $url= Utility::createUrl("documents/view&amp;export=pdf", array("id"=>$this->model->document_id));
                $type= CrudButtons::exportPdf;
            }
        }
        else {
            $url= Yii::app()->createUrl($this->routeBase."/$urlType", array("id"=>$this->id));
        }
        $href="#";
        if($type!="delete") {
            $href= $url;
        }
        
        echo "<li><a href='$href' class='button' title='$tooltip'><img alt='' src='{$base}images/icons/{$type}_48.png' ";
        if($type=="delete") {
            echo "onclick=\"confirmDelete('$url');\"";
        }
        echo "/></a></li>";
    }
    
    protected function splitAndCapitalize($str, $pluralize=true) {
        $split= preg_split('/([[:upper:]][[:lower:]]+)/', $str, null, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);
        $str= implode($split, " ");    
        $str= ucwords($str);
        if(!$pluralize) {
            $str= rtrim($str, "s");
        }

        return $str;
    }
}

?>
