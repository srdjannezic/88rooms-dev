<?php
$initialText = $this->initialText;
$searchResultsId = $this->htmlId . "_searchResults";
$searchButton = $this->htmlId . "_selectBoxButton";
$selectBoxId = $this->htmlId . "_selectBox";

$this->htmlOptions["data-result-box"] = $searchResultsId;

// parse the html options into a string, so that it can later be echoed
// into the main div element
$this->htmlOptionsString = array();
foreach ($this->htmlOptions as $key => $value) {
    $this->htmlOptionsString[] = $key . "=\"" . $value . "\"";
}
?>

<div <?php echo implode(" ", $this->htmlOptionsString); ?> style="position: relative">
    <?php echo CHtml::hiddenField($this->hiddenFieldName, $this->hiddenFieldValue); ?>

    <?php
    $disabledInput = "";
    $disabled = "";
    if (!empty($this->htmlOptions['data-disabled'])) {
        $disabledInput = "disabled";
        $disabled = "disabled='disabled'";
    }
    ?>
    <input id="<?php echo $searchButton; ?>" type="button" <?php echo $disabledInput; ?> value="<?php echo $initialText; ?>" class="btn <?php echo $disabled; ?> selectBox_button" data-init-text="<?php echo $initialText; ?>" />

    <div style="display:none" id="<?php echo $searchResultsId; ?>" class="selectBoxResult disabled well" style="width: <?php echo $this->searchBoxWidth; ?>px">

        <?php
        $searchModel = CActiveRecord::model($this->options['modelClass']);
        $model = new $searchModel;
        //Utility::dump($searchModel);
        //$searchModel->setScenario("search");
        $model->unsetAttributes();
        $this->getController()->renderPartial("//generic/findAction", array(
            'searchModel' => $model,
            'options' => $this->options,
            'type' => "selectBox",
            "random" => $this->options["random"]
        ));
        ?>
    </div>
</div>