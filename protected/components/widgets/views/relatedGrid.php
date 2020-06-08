<?php Yii::import('zii.widgets.jui.CJuiAutoComplete'); ?>

<div style="clear:both"></div>
<div class="related-grid" data-mode="<?php echo $this->multiSelect==true ? "multi" : "single"; ?>">
<?php


    $this->getController()->renderPartial("//generic/findAction", array(
        "gridOptions"=>$this->gridOptions,
        'searchModel' => $this->searchModel,
        "type"=>"related",
        "random" => $this->random,
        'options' => array(
            "url" => Yii::app()->createUrl("/{$this->relationRoute}/find"),
            "relatedGridEnableAddExisting"=>$this->enableAddExisting, 
           "searchArgument" => $this->gridSearchArgument,
            "columns" => $this->columns,
            "multiSelect"=>$this->multiSelect,
            "multiActions"=>$this->multiActions,
            "gridType"=>$this->gridType,
            "emptyGridView"=>$this->emptyGridView,
            "deleteButtonVisible"=>$this->deleteButtonVisible,
            "afterSelect"=>$this->selectBoxOptions['afterSelect']
        )
    ));
?>
</div>

