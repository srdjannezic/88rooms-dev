<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Header
 *
 * @author daniel.stojilovic
 */
class HeaderExport extends CWidget {
    /**
     * @var CActiveRecord $model
     */
    public $model;
    public $items;
    public $image;
    
    protected $_items;
    
    public function init() {
        if(!isset($this->model)) throw new Exception("Header widget: 'model' is requred");
        if($this->items==null || !is_array($this->items)) {
            throw new Exception("Header widget: 'items' is a required parameter and should be an array of fields you want to display");
        }
        if(count($this->items)>6) {
            throw new Exception("Header widget: this widget can only hold up to 6 items. You have ".count($this->items));
        }
        
        $this->_items= array();
        $n=0;
        foreach($this->items as $item) {
            if(is_string($item)) {
                $this->_items[$n]["label"]= $this->model->getAttributeLabel($item);
                $this->_items[$n]["value"]= $this->model->getAttribute($item);
            }
            elseif(is_array($item)) {
                $this->_items[$n]['label']= $this->model->getAttributeLabel($item['name']);
                if(isset($item["value"])) {
                    $this->_items[$n]['value']= $item['value'];
                }
                else {
                    $this->_items[$n]["value"]= $this->model->getAttribute($item);
                }
            }
            else {
                throw new Exception("Header widget: each item in 'items' must either be an array (name,value) or a string");
            }
            $n++;
        }
    }
    
    public function run() {
        $this->render("header_export");
    }
    
}

?>
