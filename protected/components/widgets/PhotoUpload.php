<?php

class PhotoUpload extends CWidget{
    
    
    public $id;   
    public $model;
    public $field="image";
    
    
    public function run(){
        
        $this->render('photoUpload');
        
    }
    
    
}

?>
