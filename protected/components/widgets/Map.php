<?php

/**
 * Description of Map
 * @author nikola.ristivojevic
 * 
 * This is a widget that shows a map
 * @property string $address
 * 
 * 
 */
class Map extends CWidget {
    public $address;
    
    
    public function init() {
       // if(!isset($this->address)) throw new Exception("Map widget: 'address' is requred");       
       
    }
    
    public function run() { 
        
        $this->render("map");
    }
}

?>
