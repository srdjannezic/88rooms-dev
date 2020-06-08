<?php

class LangBox extends CWidget {
    public $type = 'select';
    
    public function run() {
        $currentLang = Yii::app()->language;
        
        $this->render('langBox', array('currentLang' => $currentLang));
    }

}

?>