<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SelectBox
 *
 * @author nikola.ristivojevic
 */
class SelectBox extends CInputWidget {

    /**
     * @property array options for the select box
     * parameters are "url", "columns", "initialValue"
     */
    public $options;
    public $searchArgument;
    protected $initialText;
    protected $htmlOptionsString;
    protected $hiddenFieldName;
    protected $hiddenFieldValue = "";
    protected $searchBoxWidth;
    protected $htmlId;

    public function init() {
        //if($this->options["relatedGridSearchArgument"]!=null && $this->name=="Contact") Utility::dump ($this->options["relatedGridSearchArgument"]);
        // initialize html id and name
        
        if(isset($this->searchArgument)) {
            $this->options['searchArgument']= $this->searchArgument;
        }
        
        $this->initHtmlId();
        $this->initHiddenFieldId();

        // initialize css class. If a class is already set in htmlOptions,
        // concatenate selectBox class to it, otherwise just assign it
        if (isset($this->htmlOptions["class"])) {
            $this->htmlOptions["class"].= " selectBox";
        } else {
            $this->htmlOptions["class"] = "selectBox";
        }

        //
        if (isset($this->options['textPattern'])) {
            $this->htmlOptions['data-text-pattern'] = $this->options['textPattern'];
        }

        // initialize columns
        if (!isset($this->options['columns'])) {
            $this->options['columns'] = array();
        }
        //Utility::dump($this->options['columns']);
        // set html ID through the htmlOptions
        $this->htmlOptions["id"] = $this->htmlId . "_selectBox";

        // insert the "id" column before all other columns
        array_unshift($this->options['columns'], array(
            "name" => "id",
            "htmlOptions" => array("class" => "idColumn"),
            "headerHtmlOptions"=> array("class" => "idColumn"),
        ));       

        // calculate the width of the select box. 200 pixels per column,
        // plus additional 50 pixels for the automatically added "id" column
        $this->searchBoxWidth = (count($this->options['columns']) - 1) * 200 + 50;
        if ($this->searchBoxWidth < 250)
            $this->searchBoxWidth = 250;

        // set initial text
        if (isset($this->options['initialValue'])) {
            $this->initialText = $this->options['initialValue'];
        } else {
            $this->initialText = $this->getButtonLabel();
        }

        if (!isset($this->options["random"])) {
            $this->options["random"] = rand(1, 999999);
        }
    }

    protected function initHiddenFieldId() {
        $this->hiddenFieldName = $this->name;
        $this->hiddenFieldValue = "";
    }

    protected function initHtmlId() {
        $this->htmlId = $this->name;
    }

    protected function getButtonLabel() {
        $label = $this->name;

        preg_match_all('/((?:^|[A-Z])[a-z]+)/', $label, $matches);
        $label = implode(" ", $matches[1]);


        $buttonLabel = "";
        $vowels = array("a", "o", "e", "i", "u");
        if (in_array(strtolower($label[0]), $vowels)) {
            return sprintf(__("Add an %s"), __($label));
        } else {
            return sprintf(__("Add a %s"), __($label));
        }
    }

    public function run() {
        $this->render("selectBox");
    }

}