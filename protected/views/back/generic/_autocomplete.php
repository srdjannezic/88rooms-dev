<?php
    $url= Utility::createUrl("/".$this->getId());
    if(!isset($columns)) {
        throw new Exception('Unisearch autocomplete: you didnt set $columns in GridViewColumnsMini');
    }
    if(!isset($provider)) {
        throw new Exception('$provider is required for autocomplete. Check your controller');
    }

    $width= (count($columns)-1)*200+30;
    if($width<250) $width= 250;

    array_unshift($columns, array(
        "name"=>"id",
        "htmlOptions"=>array("style"=>'width:30px')
    ));

    echo "<input type='hidden' name='url' value='$url' />";
    $this->widget('bootstrap.widgets.BootGridView', array(
        "htmlOptions"=>array(
            "style"=>"width:{$width}px"
        ),
        'id' => 'unisearch-autocomplete',
        'dataProvider' => $provider,
        'columns' => $columns,
        "summaryText"=>"",
        "enablePagination"=>false,
        'itemsCssClass'=>"table table-condensed table-stripped autocomplete-table"
    ));
?>
