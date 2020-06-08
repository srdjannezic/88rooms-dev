<?php

/**
 * Description of Criteria
 *
 * @author daniel.stojilovic
 * @property Model $model
 */
class Criteria extends CDbCriteria {
    public $comparedColumns= array();
    
    
    public function compare($column, $value, $partialMatch = false, $operator = 'AND', $escape = true) {
        $this->comparedColumns[]= $column;
        
        return parent::compare($column, $value, $partialMatch, $operator, $escape);
    }
}

?>
