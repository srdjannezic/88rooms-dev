<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FindAction
 *
 * @author nikola.ristivojevic
 */
class FindAction extends CAction {

    public $modelClass;
    public $csvRelationProperties;

    function run() {

        $searchModel = CActiveRecord::model($this->modelClass);
        $model = new $searchModel;
        $model->setScenario("search");        
        $model->unsetAttributes();        

        if (isset($_GET[$this->modelClass])) {            
            $model->attributes = $_GET[$this->modelClass];
        }

        $options = array();
        $options["columns"] = array_keys($_GET[$this->modelClass]);

        //$random = $_POST['random'];
        $random = 1;
        
        $this->getController()->renderPartial("//generic/findAction", array(
            'searchModel' => $model,
            'options' => $options,
            "random" => $random
                ), false, true);
    }

    private function getRelationFromAttribute(CActiveRecord $model, $name) {
        foreach ($model->relations() as $key => $relation) {
            if ($relation[2] == $name) {
                return $key;
            }
        }
        return false;
    }

    private function addCriteriaBasedOnColumnName(CActiveRecord $model, &$criteria, $name) {
        $attributeRelation = $this->getRelationFromAttribute($model, $name);
        if ($attributeRelation !== false) {
            $relation = $model->getActiveRelation($attributeRelation);
            $obj = new $relation->className;
            $nameKey = $this->guessColumn($obj);

            if ($nameKey != null) {
                $this->parseValue('$data->' . $attributeRelation . "->{$nameKey}", $model, $criteria);
            }
        } else {
            $dbType = $model->getTableSchema()->getColumn($name)->dbType;

            if ($dbType == "date" || $dbType == "datetime" || $dbType == "timestamp") {
                $criteria->select[] = "ifnull(DATE_FORMAT(t." . $name . ", '%d-%m-%Y'), '')";
            } else {
                $criteria->select[] = "ifnull(t." . $name . ", '')";
            }
        }
    }

    private function guessColumn(CActiveRecord $obj) {
        if ($obj->hasAttribute("name")) {
            return "name";
        } elseif ($obj->hasAttribute("title")) {
            return "title";
        } elseif ($obj->hasAttribute("text")) {
            return "text";
        }
        else
            return null;
    }

}

?>