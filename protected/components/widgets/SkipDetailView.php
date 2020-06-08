<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * SkipDetailView is a widget that wraps around CDetailView and skips empty values
 * (doesn't show rows that contain empty values)
 *
 * @author daniel.stojilovic
 */
class SkipDetailView extends CWidget {
    public $data;
    public $attributes;
    
    public function init() {
        $newAttributes= array();
        foreach($this->attributes as $key=>$attribute) {
            
            if(!is_array($attribute)) {           
                $newAttribute= array("name"=>$attribute, "visible"=>!empty($this->data[$attribute]));
                array_push($newAttributes, $newAttribute);
            }
        }
        $this->attributes= $newAttributes;
    }
    
    public function run() {    
        $this->render("skipDetailView");
    }
    

}

?>
