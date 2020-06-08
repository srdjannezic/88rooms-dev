<?php

/**
 * Description of RelatedGrid
 * @author daniel.stojilovic
 * 
 * This is a widget that shows a grid (table) of related entries on an object
 * @property array $relatedArray Array that holds the data about related entries
 * @property array $allEntriesArray Array that holds all entries (findAll())
 * of the related object type. This is used to populate the select box which is part of the
 * "add relation" interface.
 * @property string $idArrayKey Array key that holds the id of the entry (default is 'id')
 * @property string $nameArrayKey Array key that holds the name of the entry which will be
 * displayed in the grid (default is 'name')
 * @property string $label
 * @property string $baseRoute Base route the subject 
 * @property string $relationRoute Base route of related entries. 
 * Used for "view", "update", "delete" buttons in the grid
 * 
 */
class FieldGroup extends CWidget {
    public $label;
    
    
    public function init() {
 
    }
    
    public function beginWidget() { 
        $this->render("fieldGroupBegin");
    }
    
    public function endWidget() {
        $this->render("fieldGroupEnd");
    }
}

?>
