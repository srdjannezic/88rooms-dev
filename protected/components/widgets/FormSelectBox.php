<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SelectBox
 *
 * @author daniel.stojilovic
 */
class FormSelectBox extends SelectBox {
    
    protected function initHiddenFieldId() {
        $nameId= $this->resolveNameID();
        $this->hiddenFieldName= $nameId[0];
        $this->hiddenFieldValue= $this->model[$this->attribute];
    }
    protected function initHtmlId() {
        $nameId= $this->resolveNameID();
        $this->htmlId= $this->attribute;
    }
    protected function getButtonLabel() {
        $attributeLabels= $this->model->attributeLabels();
        $label= $attributeLabels[$this->attribute];
        preg_match_all('/((?:^|[A-Z])[a-z]+)/',$label,$matches);
        $label= implode(" ", $matches[1]);
        
        $buttonLabel="";
        $vowels= array("a", "o", "e", "i", "u");
        return __("Selektuj")." ".$label;
        if(in_array(strtolower($label[0]), $vowels)) {
            return __("Selektuj")." ".$label;
        }
        else {
            return __("Select a")." ".$label;
        }
    }

    
    public function run() {
        $this->render("selectBox");
    }
}

?>
