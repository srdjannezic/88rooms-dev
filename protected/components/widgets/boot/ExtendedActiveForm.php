<?php

/**
 * Description of ExtendedActiveForm
 *
 * @author nikola.ristivojevic
 */
Yii::import('bootstrap.widgets.BootActiveForm');

class ExtendedActiveForm extends BootActiveForm {

    const INPUT_HORIZONTAL = 'application.components.widgets.boot.ExtendedBootInputHorizontal';
    const INPUT_VERTICAL = 'application.components.widgets.boot.ExtendedBootInputVertical';
    const INPUT_SEARCH = 'application.components.widgets.boot.ExtendedBootInputSearch';

    /**
     * Renders a select box row
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array array $selectBoxOptions Options for the select box. Predefined
     * options are located in the SelectBoxOptions class as static functions, so
     * for example you can use SelectBoxOptions::Contacts()
     * @param array $htmlOptions additional HTML attributes
     * @return string the generated row
     */
    public function selectBoxRow($model, $attribute, $selectBoxOptions = null, $htmlOptions = array()) {
        return $this->inputRow("selectBox", $model, $attribute, $selectBoxOptions, $htmlOptions);
    }
    
    public function multiSelectRow($model, $attribute, $data, $selected=array(), $callback=null, $htmlOptions=array()) {
        return $this->inputRow("multiSelect", $model, $attribute, array(
            "data"=>$data, "selected"=>$selected, "callback"=>$callback,
        ), $htmlOptions);
    }

    public function datepickerRow($model, $attribute, $htmlOptions = array()) {
        return $this->inputRow('datePicker', $model, $attribute, null, $htmlOptions);
    }

    protected function selectBox($model, $attribute, $selectBoxOptions = null, $htmlOptions = array()) {
        Yii::app()->controller->widget('FormSelectBox', array(
            'model' => $model,
            'attribute' => $attribute,
            'options' => $selectBoxOptions,
            'htmlOptions' => $htmlOptions,
        ));
    }
    
    protected function ckEditorRow($model, $attribute, $htmlOptions = array()) {
        return $this->inputRow('ckEditor', $model, $attribute, null, $htmlOptions);
    }

    protected function timeFieldRow($model, $attribute, $htmlOptions = array()) {
        return $this->inputRow("timeField", $model, $attribute, null, $htmlOptions);
    }

    /**
     * Returns the input widget class name suitable for the form. This had to be 
     * overriden to support overriding contacts
     * @return string the class name
     */
    protected function getInputClassName() {

        $c = get_called_class();

        // Determine the input widget class name.
        switch ($this->type) {
            case self::TYPE_HORIZONTAL:
                return $c::INPUT_HORIZONTAL;
                break;

            case self::TYPE_INLINE:
                return $c::INPUT_INLINE;
                break;

            case self::TYPE_SEARCH:
                return $c::INPUT_SEARCH;
                break;

            case self::TYPE_VERTICAL:
            default:
                return $c::INPUT_VERTICAL;
                break;
        }
    }

}

?>