<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrudControlls
 *
 * @author daniel.stojilovic
 */
class CrudControlls extends CWidget {
    public $routeBase;
    public $buttons;
    public $id;
    public $model;
    protected $allowedButtons;
    protected $buttonsRequiringId;
    protected $defaultButtons;
    
    public function run() {
        $this->render("crudControlls");
    }
    
    public function init() {
        $this->allowedButtons= array(
            CrudButtons::view,
            CrudButtons::update,
            CrudButtons::delete,
        );
        
        $this->buttonsRequiringId= array(
            CrudButtons::view,
            CrudButtons::update,
            CrudButtons::delete
        );
        
        $this->defaultButtons= array(
            "index"=> array( // index (list entries) page
                CrudButtons::view, 
                CrudButtons::update,
                CrudButtons::delete,
            ),
        );
        
        // current running action
        $action= $this->getController()->getAction()->getId();
        if(!in_array($action, array("index", "update", "view", "admin", "create"))) {
            $action= "view";
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
        $upperType= ucfirst($type);
        $url= Yii::app()->createUrl($this->routeBase."/$type", array("id"=>$this->id));
        $href="#";
        if($type!=  CrudButtons::delete) {
            $href= $url;
        }
        
        echo "<li><a class='button' title='$upperType' href='$href'>
        <img alt='$upperType' src='{$base}images/icons/{$type}_48.png' ";
        
        if($type=="delete") {
            echo "onclick=\"confirmDelete('$url');\"";
        }
            
        echo "/>
            </a></li>";
    }
}

?>
