<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author daniel.stojilovic
 */
class Model extends CActiveRecord {

    public $_excerpt = '';
    public $fields = array();
    public $searchQuery;

    public function fieldNames() {
        return array();
    }

    public function exists($condition = '', $params = array()) {
        if ($condition instanceof Criteria) {
            $condition = $this->fixCriteria($condition);
        } elseif (is_string($condition)) {
            $condition = $this->fixStringCondition($condition);
        }

        return parent::exists($condition, $params);
    }

    public function findAll($condition = '', $params = array()) {
        if ($condition instanceof Criteria) {
            $condition = $this->fixCriteria($condition);
        } elseif (is_string($condition)) {
            $condition = $this->fixStringCondition($condition);
        }

        return parent::findAll($condition, $params);
    }

    public function count($condition = '', $params = array()) {
        if ($condition instanceof Criteria) {
            $condition = $this->fixCriteria($condition);
        }
        return parent::count($condition, $params);
    }

    protected function fixStringCondition($str) {
        // 
        $fields = $this->fieldNames();
        foreach ($fields as $key => $field) {
            $str = preg_replace("/" . $key . "/", $field, $str);
        }
        return $str;
    }

    protected function fixCriteria($criteria) {
        if ($criteria instanceof Criteria) {
            $fields = $this->fieldNames();

            if (is_string($criteria->with) || count($criteria->with) > 0) {
                if (is_string($criteria->with)) {
                    if (array_key_exists($criteria->with, $this->relations())) {
                        Utility::dump("YEA");
                    }
                } else {
                    $relations = $this->relations();
                    foreach ($criteria->with as $withItem) {
                        foreach ($relations as $key => $relation) {
                            if ($withItem == $key) {
                                $relationClassName = $relations[$key][1];
                                $relationModel = new $relationClassName;
                                $relationFields = $relationModel->fieldNames();
                                $fields = array_merge($fields, $relationFields);
                            }
                        }
                    }
                }
            }

            foreach ($criteria->comparedColumns as $column) {
                if (count($fields) > 0) {
                    $dotPos = strrpos($column, ".", -1);

                    if ($dotPos !== false) {
                        $field = substr($column, $dotPos + 1);
                        if (array_key_exists($field, $fields)) {
                            $actualColumn = substr($column, 0, $dotPos) . "." . $fields[$field];
                            $criteria->condition = preg_replace("/" . $column . "/", $actualColumn, $criteria->condition);
                        }
                    } else {
                        $field = $column;
                        if (array_key_exists($field, $fields)) {
                            $column = $fields[$field];
                        }
                    }
                }
            }
        }
        return $criteria;
    }

    public function findAllByAttributes($attributes, $condition = '', $params = array()) {
        $fields = $this->fieldNames();

        foreach ($attributes as $key => $attribute) {
            if (array_key_exists($key, $fields)) {
                unset($attributes[$key]);
                $attributes[$fields[$key]] = $attribute;
            }
        }

        return parent::findAllByAttributes($attributes, $condition, $params);
    }

    public function __get($name) {
        $fields = $this->fieldNames();

        if (array_key_exists($name, $fields)) {
            $name = $fields[$name];
        }

        return parent::__get($name);
    }

    public function __set($name, $value) {
        $fields = $this->fieldNames();

        if (array_key_exists($name, $fields)) {
            $name = $fields[$name];
        }

        parent::__set($name, $value);
    }

}

?>