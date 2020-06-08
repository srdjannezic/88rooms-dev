<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property array $inputs Each is an array containing following fields:
 * name, defaultText, small (boolean - if true it will render a small input)
 */
class Sortable extends CWidget {

    public $model;
    public $class;
    public $addButtonText;
    public $inputs;
    public $width;
    public $type;
    public $enableAdd = true;
    public $form = true;
    public $disabled;
    public $sort = true;
    public $name = null;
    public $imageModel = null;
    public $imageRelation = null;
    public $renderModal = true;
    protected $_dropDown;

    public function init() {
        if (isset($this->model)) {
            if (is_array($this->model)) {
                $this->class = get_class($this->model[0]);
            } else {
                throw new Exception('Sortable extension: $model must be an array');
            }
        } else {
            throw new Exception('Sortable extension: $model is a required parameter');
        }

        if (!isset($this->name)) {
            $this->name = $this->class;
        }

        // calculate width for the sortable based on inputs. Each large input adds
        // 220px, each small tiny adds 50px, small adds 100px, plus 70px for buttons, margins etc
        $tinyInputs = 0;
        $smallInputs = 0;
        $images = 0;
        $visibleInputs = 0;
        $checkboxes = 0;
        foreach ($this->inputs as &$input) {
            /*
              if(isset($input['name']) && strpos($input['name'], ".")!=false) {
              $relationArray= explode(".", $input['name']);
              if(count($relationArray)>1) {
              $dummy= $data_piece;
              foreach($relationArray as $relation_piece) {
              $dummy= $dummy->{$relation_piece};
              }
              $attr[$key]= $dummy;
              }
              else {
              $attr[$key]= $data_piece->{$relationString};
              }
              }
             *
             */

            if (isset($input['dropDown'])) {
                $input['type'] = "dropDown";
            } elseif (isset($input['hidden'])) {
                $input['type'] = "hidden";
            } elseif (isset($input['image'])) {
                $input['type'] = "image";
            } elseif (isset($input['media'])) {
                $input['type'] = "media";
            } elseif (isset($input['checkbox'])) {
                $input['type'] = "checkbox";
            } elseif ($input['type'] == "colorpicker") {
                $input['size'] = "tiny";
            }

            if ($input['type'] != 'hidden') {

                $visibleInputs++;
                if ($input['type'] == "checkbox") {
                    $checkboxes++;
                } else {
                    if ($input['size'] == 'tiny') {
                        $tinyInputs++;
                        $input['size'] = $input['type'] == "dropDown" ? 70 : 50;
                    } elseif ($input['size'] == 'small') {
                        $smallInputs++;
                        $input['size'] = $input['type'] == "dropDown" ? 110 : 100;
                    } else {
                        $input['size'] = $input['type'] == "dropDown" ? 225 : 215;
                    }
                    if ($input['type'] == "image") {
                        $images++;
                        $input['size'] = 60;
                    }
                    if ($input['type'] == "media") {
                        $images++;
                        $input['size'] = 60;
                    }
                }
            } else {
                $input['size'] = 0;
            }
        }
        if ($visibleInputs < 1)
            throw new Exception("Sortable widget: There needs to be at least one visible input");
        $this->width = 230 * ($visibleInputs - $smallInputs - $tinyInputs - $images - $checkboxes) + 100 * $smallInputs + 55 * $tinyInputs + 60 * $images + 20 * $checkboxes + 65;
    }

    public static function initSortable($class, $criteria) {
        $model = array();
        if (isset($_POST[$class])) {
            //Utility::dump($_POST[$class]);
            $n = 0;
            foreach ($_POST[$class] as $item) {
                $model[$n] = new $class;
                $model[$n]->attributes = $item;
                $n++;
            }
        } else {
            $model = CActiveRecord::model($class)->findAll($criteria);
        }

        return $model;
    }

    public function run() {
        $this->render("sortable");
    }

}

?>