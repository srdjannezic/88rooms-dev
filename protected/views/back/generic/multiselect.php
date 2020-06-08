<?php

$sel= array();
foreach($selected as $s) {
    $sel[]= $s->function_id;
}


echo "<div class='multiselect hide' id='contact_functions_".$contact->id."'>". Yii::app()->getController()->widget('ext.multiselect.JMultiSelect',array(
            'name'=>'contact_functions_'.$contact->id,
            'data'=>  CHtml::listData(ConfigContactFunction::model()->findAll(array("order"=>"ordr")), "id", "name"),
            'callback'=>$callback,
            'selected'=>$sel,
            // additional javascript options for the MultiSelect plugin
            'options'=>array("header"=>true)
        ),true) ."</div>";
?>
