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
class RelatedGrid extends CWidget {

    public $relationClassName;
    public $relationRoute;
    public $enableAddExisting = true;
    public $addNewUrl;
    public $addNewUrls;
    public $buttons;
    public $multiSelect = false;
    public $multiActions;
    public $gridOptions = array();
    public $idField = "id";
    public $columns;
    public $gridSearchArgument;
    public $selectBoxSearchArgument;
    public $selectBoxOptions;
    public $random;
    public $csv = true;
    public $selectBoxCondition = null;
    public $emptyGridView = null;
    public $deleteButtonVisible = true;
    public $debug = false;
    public $toolbarExtraButtons=array();
    
    protected $enableAddNew = false;
    protected $gridType;
    protected $searchModel;
    protected $dataId; // used in '$data' segments ($data is parsed for each table row)
    protected $complexId; // used in $model->complexId segments

    public function init() {
        if(!isset($this->relationRoute)) {
            throw new Exception("RelatedGrid widget: relationRoute is required");
        }        
        
        if(!Utility::checkAccess("Read", $this->relationRoute)) {
            return false;
        }
        
        if($this->idField!="id" && strpos($this->idField, ".")!==false) {
            $split= explode(".", $this->idField);
            $this->dataId= '$data->{'.$split[0].'}["' . $split[1] . '"]';
            $this->complexId= $split[0].'->'.$split[1];
        }
        else {
            $this->dataId= '$data["' . $this->idField . '"]';
            $this->complexId= '$this->idField';
            
        }
        
        if (isset($this->addNewUrl) || isset($this->addNewUrls)) {
            $this->enableAddNew = true;
        }
        if (!isset($this->selectBoxOptions)) {
            $this->enableAddExisting = false;
        } else {
            $this->selectBoxOptions['relatedGridEnableAddExisting'] = $this->enableAddExisting;
        }

        if ($this->selectBoxCondition != null) {
            $this->selectBoxOptions['condition'] = $this->selectBoxCondition;
        }

        if (!isset($this->random)) {
            $this->random = rand(1, 999999);
        }
        $this->selectBoxOptions["random"] = $this->random;
        $this->selectBoxOptions['multiSelect'] = $this->multiSelect;

        if (!$this->selectBoxOptions['multiSelect']) {
            $this->selectBoxOptions['afterSelect'] = 'function() {$(this).parents("form").find(".add").show()}';
        }

        if (!isset($this->gridSearchArgument)) {
            $this->gridSearchArgument = null;
        }

        // insert the "id" column before all other columns,
        // but only if it doesn't exist already. Sometimes, an id column will
        // actually be a relation id in the format od RELATION.id, so we check
        // if such an id column exists as well
        if (
                $this->columns[0] == "id"
        ) {
            //unset($this->columns[0]);
        } elseif (isset($this->columns['id'])) {
            unset($this->columns['id']);
        }
        

        // initialize row buttons. If buttons are already set, remove them.
        // (custom buttons are not allowed)
        if (isset($this->columns) && count($this->columns) > 0) {
            foreach ($this->columns as $key => $value) {
                if (isset($value["class"]) && ($value["class"] == "CButtonColumn" || $value["class"] == "bootstrap.widgets.TbButtonColumn")) {
                    unset($this->columns[$key]);
                }
            }
        }

        if ($this->multiSelect) {
            // if there is no checkbox column, insert checkbox column for multi select
            $hasCheckBoxColumn= false;
            foreach($this->columns as $column) {
                if($column['class']=="CCheckBoxColumn") {
                    $hasCheckBoxColumn= true; break;
                }
            }
            if(!$hasCheckBoxColumn) {
                array_unshift($this->columns, array(
                    'class' => 'CCheckBoxColumn',
                    "selectableRows" => 2
                ));
            }
        }

        // set up row button "template", which tells which buttons will be shown
        $buttonTemplate = array();
        $extraButtons = array();
        if (isset($this->buttons) && count($this->buttons) > 0) {
            foreach ($this->buttons as $name => $button) {
                if ($button == CrudButtons::view) {
                    $buttonTemplate[] = "{view}";
                } elseif ($button == CrudButtons::update) {
                    $buttonTemplate[] = "{update}";
                } elseif ($button == CrudButtons::delete) {
                    $buttonTemplate[] = "{delete{$this->getRelationClassName()}Relation}";
                } elseif (is_array($button) && isset($name) && is_string($name)) {
                    $name = "_" . $name;
                    $extraButtons[$name] = $button;
                    $buttonTemplate[] = '{' . $name . '}';
                }
            }
        }
        $buttonTemplate = implode(" ", $buttonTemplate);


        // add delete relation button
        $extraButtons['delete' . $this->getRelationClassName() . 'Relation'] = array(
            'label' => __('Remove'), //Text label of the button.
            'url' => 'Yii::app()->createUrl("/' . Yii::app()->controller->id . '/delete' . $this->getRelationClassName() . 'Relation", array("id"=>"' . $_GET["id"] . '", "' . $this->getRelationClassName() . 'Id"=>'.$this->dataId.'))',
            //'imageUrl'=>Yii::app()->baseUrl.'/images/icons/delete_16.png',  //Image URL of the button.
            'icon' => 'remove',
            'click' => 'function() {return confirmDelete(false, $(this));}', //A JS function to be invoked when the button is clicked.
        );
        $extraButtons['delete' . $this->getRelationClassName() . 'Relation']['visible'] = "'" . $this->deleteButtonVisible . "'";


        // add the row buttons column
        if(isset($this->buttons) && count($this->buttons)>0) {
            $this->columns[] = array(
                'class' => 'bootstrap.widgets.TbButtonColumn'
                , 'htmlOptions' => array('style' => 'width: 50px', "class" => "button-column")
                , 'template' => $buttonTemplate
                , 'viewButtonUrl' => 'Yii::app()->createUrl("/' . $this->relationRoute . '/view", array("id"=>'.$this->dataId.'))'
                , 'updateButtonUrl' => 'Yii::app()->createUrl("/' . $this->relationRoute . '/update", array("id"=>'.$this->dataId.'))'
                , 'deleteButtonUrl' => 'Yii::app()->createUrl("/' . Yii::app()->controller->id . '/delete' . $this->getRelationClassName() . 'Relation", array("id"=>'.$this->dataId.'))'
                , 'buttons' => $extraButtons
            );
        }

        if ($this->enableAddNew && !$this->enableAddExisting) {
            $this->gridType = GridType::addNew;
        } elseif ($this->enableAddExisting && !$this->enableAddNew) {
            $this->gridType = GridType::addExisting;
        } elseif ($this->enableAddNew && $this->enableAddExisting) {
            $this->gridType = GridType::both;
        } else {
            $this->gridType = GridType::none;
        }

        // prepare select box
        $this->searchModel = CActiveRecord::model($this->relationClassName);
        $this->searchModel->setScenario("search");
        $this->searchModel->unsetAttributes();


        if ($this->enableAddExisting) {
            $notIn = RelatedGrid::getNotIn($this->searchModel, $this->gridSearchArgument, $this->idField, $this->selectBoxCondition);
            
            if ($notIn != null) {
                
                $this->selectBoxOptions["searchArgument"] = $notIn;
                
            }
            
        }

        $this->selectBoxOptions["idField"] = $this->idField;
        $this->selectBoxOptions["relatedGridSearchArgument"] = $this->gridSearchArgument;
        
        
        

        $this->initSummary();

        if ($this->debug == true) {
            Utility::dump($this);
        } elseif (is_string($this->debug)) {
            Utility::dump(${$this->debug});
        }
    }

    protected function initSummary() {
        $t = "<div class='left toolbar'>";
        
        //Utility::dump($this->selectBoxOptions);
        foreach($this->toolbarExtraButtons as $toolbarButton) {
            $t.= $toolbarButton;
        }
        
        $t.= $this->selectBox($this->enableAddExisting, $this->relationClassName, $this->selectBoxOptions, $this->multiSelect);

        if ($this->enableAddNew) {
            if (isset($this->addNewUrls)) {
                $t.= "<div class='btn-group left addNew' style='margin-right: 10px'>";
                foreach ($this->addNewUrls as $key => $url) {
                    $t.= "<a href='{$url}' class='btn left'><i class='icon-plus'></i> {$key}</a>";
                }
                $t.= "</div>";
            } else {
                $t.= "<a style='margin-right: 10px' href='{$this->addNewUrl}' class='btn left addNew'><i class='icon-plus'></i> ".__("Create")."</a>";
            }
        }

        if ($this->csv) {
            $t.= "<form method='post' class='exportCsv left' action='" . Yii::app()->createAbsoluteUrl("/{$this->relationRoute}/find") . "&export=csv'>
            <input type='hidden' name='searchArgument' value='" . urlencode(serialize($this->gridSearchArgument)) . "' />
            <input type='hidden' name='columns' value='" . urlencode(CJSON::encode($this->columns)) . "' />
            <button type='submit' class='btn'><i class='icon-share'></i> ".sprintf(__("Export %s"), "CSV")."</button>
            </form>";
        }

        $t.= "</div>"; // end of left toolbar


        $t.= "<div class='right toolbar'>";
        
        // if the grid is multiselect, add a button group to the summary for multi actions
        if ($this->multiSelect == true) {
            $t.= "<div class='btn-group left hide' style='margin-right:10px'>";
            foreach($this->multiActions as $key=>$multiAction) {
                $tooltip= " title='{$multiAction['text']}' rel='tooltip' ";
                
                $htmlOptionsArray= array();
                foreach($multiAction['htmlOptions'] as $key=>$htmlOption) {
                    $htmlOptionsArray[]= "{$key}=\"{$htmlOption}\"";
                }
                $htmlOptionsString= implode(" ", $htmlOptionsArray);
                
                $icon= isset($multiAction['icon']) ? "<i class='icon-{$multiAction['icon']}'></i> " : ""; 
                $color= isset($multiAction['color']) ? "btn-{$multiAction['color']}" : "";
                $url= isset($multiAction['url']) ? $multiAction['url']."&ids=" : "#";
                
                $t.= "<a id='{$key}' {$tooltip} class='btn {$color} {$multiAction['htmlOptions']['class']}' {$htmlOptionsString} href='{$url}'>{$icon}</a>";
            }
            if ($this->deleteButtonVisible) {
                $deleteHref = Yii::app()->createUrl($this->getController()->getId() . '/delete' . $this->getRelationClassName() . 'Relation', array("id"=>$_GET["id"], $this->relationClassName.'Id'=>""));
                $t.= "<a onclick='return confirmDelete(null, $(this))' title='".__("Remove selected items")."' rel='tooltip' class='btn btn-danger' href='{$deleteHref}'><i class='icon-remove icon-white'></i></a>";
            }
            $t.= "</div>";
        }
        $t.= "<span class='left'>".Yii::t('zii', 'Displaying {start}-{end} of {count} result(s).')."</span>";
        $t.= "</div>";
        $this->gridOptions['summaryText'] = $t;
    }
    
    protected static function selectBox($enableAddExisting, $relationClassName, $selectBoxOptions, $multiSelect) {
        if ($enableAddExisting) {
            $t= "
            <form action='" . Yii::app()->createUrl('/' . Yii::app()->controller->id . '/add' . $relationClassName . 'Relation', array("id" => $_GET["id"])) . "' method='post' class='left'>
                <div class='left' style='margin-right:10px;'>";
            $t.= Yii::app()->getController()->widget('SelectBox', array(
                "name" => $relationClassName,
                "options" => $selectBoxOptions,
                    ), true);
            $t.= "</div>";
            if (!$multiSelect) {
                $t.= "<div class='right'>
                <input type='submit' value='".__("Add selected")."' class='btn add hide' onclick='addRelation($(this)); return false;' />
            </div>";
            }
            $t.= "</form>";
            return $t;
        }
    }

    public function run() {        
        if(!Utility::checkAccess("Read", $this->relationRoute)) {
            echo "Access denied"; return false;
        }
        $this->render("relatedGrid");
    }

    public function getRelationClassName() {
        return $this->relationClassName;
    }

    /**
     * @return CDbCriteria
     */
    public static function getNotIn($searchModel, $relatedGridSearchArgument, $idField = "id", $additionalCondition = null) {
        // the following block gets "unrelated records", or those records that are 
        // not already related to this entity. This is to prevent adding a relation
        // that already exists. If "enableAdd" is set to false, or in other words, 
        // we hide the add button, then this whole block is not needed
        $dataProvider = $relatedGridSearchArgument == null ? $searchModel->search() : $searchModel->search($relatedGridSearchArgument);
        $dataProvider->pagination = false;
        $data = $dataProvider->getData();
        
        

        $notInCriteria = new CDbCriteria();
        if ($additionalCondition != null) {
            $notInCriteria->addCondition($additionalCondition);
        }

        if (count($data) > 0) {
            $notIn = array();
            foreach ($data as $entry) {
                if($idField!="id" && strpos($idField, ".")!==false) {
                    $split= explode(".", $idField);      
                    $notIn[] = $entry->$split[0]->$split[1];
                }
                else {
                    $notIn[] = $entry->$idField;
                }
            }

            $notInCriteria->addNotInCondition("t.id", $notIn);

            return $notInCriteria;
        }
        if ($additionalCondition != null) {
            return $notInCriteria;
        } else {
            return null;
        }
    }

}