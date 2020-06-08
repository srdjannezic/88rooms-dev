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
class Header extends CWidget {
    /**
     * @var CActiveRecord $model
     */
    public $model;
    public $items;
    public $image;
    
    protected $imageUrl;
    protected $lighboxUrl;
    
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
        
        if($this->image!==false) {
            if(!is_array($this->image)) {
                $this->image= array();
            }
            //Utility::dump($this->image['path']);

            if(!isset($this->image['label']) && (!isset($this->image['manual']) || $this->image['manual']!=true)) {
                if(!isset($this->image['class'])) $this->image['class']= get_class($this->model);
                if(!isset($this->image['field'])) $this->image['field']= "image";
                if(!isset($this->image['id'])) $this->image['id']= $this->model->id;
                if(!isset($this->image['lightBox'])) $this->image['lightBox']= true;
                if(empty($this->image['path'])) $this->image['path']= false;
            }        
        }
    }
    
    public function run() {
        $this->render("header");
    }
    
}

?>
