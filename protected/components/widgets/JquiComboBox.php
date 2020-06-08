<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JquiComboBox
 *
 * @author daniel.stojilovic
 */
class JquiComboBox extends CJuiAutoComplete {
    public $url;
    public $idField;
    public $textField;
    public $relationClassName;
   
    
    public function run()
	{
        Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'js/customJqueryUi.js');
        
        // combobox css
        Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'js/jquery-easyui/themes/default/combo.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'js/jquery-easyui/themes/default/combobox.css');
        // combobox js
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'js/customJqueryUi.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'js/jquery-easyui/jquery.easyui.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'js/jquery-easyui/jquery.combo.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'js/jquery-easyui/jquery.combobox.js');
       
        $id= $this->relationClassName;
        
        echo "<input id='$id' name='$id' type='text' />";
		$js = "jQuery('#{$id}').superCombobox({  
            url:'$this->url',  
            valueField:'$this->idField',  
            textField:'$this->textField',
            mode: 'remote'    
        });";

		$cs = Yii::app()->getClientScript();
		$cs->registerScript(__CLASS__.'#'.$id, $js);
	}
}

?>
