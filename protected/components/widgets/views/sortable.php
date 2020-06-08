<?php
if($this->form!==false && !($this->form instanceof CActiveForm)) {
    $form = $this->beginWidget('ext.bootstrap.widgets.BootActiveForm', array(
        'id' => $this->name . '-sortable-form',
        "htmlOptions" => array(
            "name" => $this->name . "-sortable-form-{$rand}",
        ),
        'enableAjaxValidation' => false,
            ));
}
elseif($this->form instanceof CActiveForm) {
    $form= $this->form;
}
?>

<?php
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(
        Yii::app()->baseUrl . "/css/smoothness/jquery-ui.min.css"
);
?>

<?php
try {
    if($this->renderModal!==false) {
        $this->getController()->renderPartial("image_upload_modal");
    }
}
catch(Exception $e) {

}
?>

<div style="width:<?php echo $this->width; ?>px; position:relative" class="sortable-box <? echo $this->class; ?>-sortable-box">
    <div class="defaultImage hide">
        <?php
        $this->widget("PhotoUpload", array(
            'model' => $this->name,
        ));
        ?>
    </div>
    <div style="position: relative">
        <?php if($this->enableAdd): ?>
            <button type="button" class="btn add" style="float:right"><i class="icon-plus"></i> <?php echo $this->addButtonText; ?></button>
        <?php endif; ?>

        <?php if($this->sort !== false): ?>
            <div style="position: absolute; bottom:10px">
                <div style="margin-top: -10px">
                    <div class="left info"><?php echo sprintf(__('Drag the %s icons to reorder'), "<span style='display:inline-block' class='handle ui-icon ui-icon-arrowthick-2-n-s'></span>"); ?> </div>
                </div>
            </div>
        <?php endif; ?>
        <div style="clear:both"></div><br />
    </div>

    <table class='sortable <? echo $this->class; ?> <?php if($this->type == "image") echo "image"; ?>'>
        <?php
        // header
        $needColorPickerScript = false;
        echo "<thead><tr><th></th>";
        foreach($this->inputs as $input) {
            if($input['type'] == "colorpicker") {
                $needColorPickerScript = true;
            }
            if($input['type'] != 'hidden') {
                $size = $input['size'];
                echo "<th style='width:{$size}px'>" . $this->model[0]->getAttributeLabel($input['name']) . "</th>";
            }
            else {
                echo "<th style='display:none'></th>";
            }
        }
        echo "<th></th></tr></thead>";

        if($needColorPickerScript) {
            Yii::app()->clientScript->registerScriptFile(baseUrl() . "js/colorpicker/js/colorpicker.js");
            Yii::app()->clientScript->registerCssFile(baseUrl() . "js/colorpicker/css/colorpicker.css");
        }

        echo "<tbody>";

        $n = 0;
        foreach($this->model as $modelRow) {
            echo "<tr class='pill' style='text-align:left'>";

            echo "<td style='width:16px'>";
            if($this->sort !== false) {
                echo "<span class='handle ui-icon ui-icon-arrowthick-2-n-s'></span>";
            }
            echo "</td>";

            $wholeRowDisabled = false;
            foreach($this->inputs as $input) {
                if($input['disableType'] == "row") {
                    if($input['disabled'] === true) {
                        $wholeRowDisabled = true;
                    }
                    elseif(isset($modelRow->{$input['name']}) && isset($input['disabled'])) {
                        $wholeRowDisabled = array_search($modelRow->{$input['name']}, $input['disabled']) !== false;
                    }
                }
            }

            foreach($this->inputs as $input) {
                $disabled = false;
                $hardDisable = false;

                if($wholeRowDisabled === true) {
                    $disabled = true;
                }
                else {
                    if(isset($input['disabled'])) {
                        if($input['disabled'] === true) {
                            $disabled = true;
                            $hardDisable = true;
                        }
                        else {
                            $disabled = array_search($modelRow->{$input['name']}, $input['disabled']) !== false;
                        }
                    }
                    else {
                        $disabled == false;
                    }
                }

                $disabledStr = $disabled ? "disabled" : "";

                $style = "width:{$input['size']}px";
                if($input['type'] == 'dropDown') {

                    $dropDownHtmlOptions = array(
                        "style" => $style,
                        "class" => $input['name'],
                        "empty" => $input['defaultText']
                    );
                    if($disabled) {
                        $dropDownHtmlOptions['disabled'] = "disabled";
                    }
                    if($input['unique'] === true) {
                        $dropDownHtmlOptions['data-unique'] = "true";
                    }

                    echo "<td>";
                    echo CHtml::dropDownList("{$this->name}[{$modelRow->id}][{$input['name']}]", "{$this->model[$n][$input['name']]}", $input['dropDown'], $dropDownHtmlOptions);
                    echo "</td>";
                }
                elseif($input['type'] == "image") {
                    echo "<td>";

                    if(!is_array($input['image']))
                        $input['image'] = array();
                    if(!isset($input['image']['field']))
                        $input['image']['field'] = "image";

                    //$url= Yii::app()->createUrl("/files/photo", array("id"=>$modelRow->id,"model"=>$this->name,"field"=>$input['image']['field']));
                    echo "<" . ($disabled ? "div" : "a") . " style='" . ($disabled ? "opacity:0.2;" : "") . "width:50px;height:50px' ";
                    if(!$disabled) {
                        echo "data-toggle='modal'";
                    }
                    echo " href='#image-upload-modal' onclick=\"loadImageModal('" . Yii::app()->createUrl("/files/getUploadForm") . "', '{$this->name}', '{$input['image']['field']}', {$modelRow->id})\">";
                    $this->widget("Photo", array(
                        'id' => $modelRow->id,
                        'model' => $this->name,
                        'field' => $input['image']['field']
                    ));
                    echo "</" . ($disabled ? "div" : "a") . ">";

                    echo "</td>";
                }
                elseif($input['type'] == "checkbox") {
                    echo "<td>";

                    $value = $this->model[$n][$input['name']];
                    $checked = $value == 1 ? "checked='checked'" : "";
                    $active = $value == 1 ? "active" : "";
                    //$disabled= in_array($this->model[$n][$input['name']], $input['disabled']) ? "disabled='disabled'" : "";
                    echo "<label title='{$input['defaultText']}' rel='tooltip' class='boxy {$active}'>";
                    echo "<input {$checked} {$disabledStr}  class='{$input['name']}' type='checkbox'
                     name='{$this->name}[{$modelRow->id}][{$input['name']}]' value='{$value}' />";
                    echo "</label>";

                    echo "</td>";
                }
                elseif($input['type'] == "colorpicker") {
                    $value = $this->model[$n][$input['name']];
                    echo "<td>";
                    echo "<div class='controls' style='position:relative; height:28px; width:28px; margin-left:auto;margin-right:auto;'>
                    <input type='hidden' name='{$this->name}[{$modelRow->id}][{$input['name']}]' value='{$value}' />
                        <div class='colorSelector'><div style='background-color: #{$value}'></div></div>
                    </div>";
                    echo "</td>";
                }
                elseif($input['type'] == "hidden") {
                    $value = isset($input['value']) ? $input['value'] : $this->model[$n][$input['name']];
                    echo "<td style='display:none'><input type='hidden' class='{$input['name']}' name='{$this->name}[{$modelRow->id}][{$input['name']}]' value='{$value}' /></td>";
                }
                else {
                    echo "<td>";

                    $value = $this->model[$n][$input['name']];
                    $htmlOptions = array(
                        'data-hard-disable' => $hardDisable,
                        'placeholder' => $input['defaultText'],
                        'class' => "{$input['name']} ",
                        'style' => "width:{$input['size']}px"
                    );
                        if($disabled) {
                            $htmlOptions['disabled']= "disabled";
                        }
                    echo Chtml::textField("{$this->name}[{$modelRow->id}][{$input['name']}]", $value, $htmlOptions);
                    /*
                      echo "<input data-hard-disable='{$hardDisable}' $disabledStr placeholder='{$input['defaultText']}' class='{$input['name']} ' type='text' "
                      . "name='{$this->name}[{$modelRow->id}][{$input['name']}]' value='{$value}'";
                      echo " style='width:{$input['size']}px' ";

                      echo " />";
                     *
                     */

                    echo "</td>";
                }
            }
            echo "<input class='ordr' type='hidden' name='{$this->name}[{$modelRow->id}][ordr]' value='{$this->model[$n]['ordr']}' style='width:40px' />";

            // check if any of the inputs have disabled entries. If there is at least one disabled entry, delete button will be disabled

            $hideDeleteButton = (!$this->enableAdd || $disabled == true) ? "style='display:none'" : "";
            echo "<td style='width:36px'>";
            echo "<a title='" . __('Delete') . "' rel='tooltip' href='#' class='delete' {$hideDeleteButton}><span class='ui-icon ui-icon-close'></span></a>";
            echo "</td>";


            echo "</tr>";
            echo "<tr class='spacer'></tr>";

            $n++;
        }
        ?>
        </tbody></table>
</div>
<?php if($this->form !==false && !($this->form instanceof CActiveForm)): ?>
    <div class="form-actions">
        <?php echo CHtml::submitButton(__('Save'), array('class' => 'btn btn-primary left')); ?>
        <img style="display: none; margin-left: 5px; margin-top: 5px" src="<?php echo Yii::app()->baseUrl . "images/loading.gif"; ?>" />
    </div>

    <?php
    $this->endWidget();
endif;
?>


<script type="text/javascript">
    $(function() {
        var $sortable= $( ".sortable.<? echo $this->class; ?>" );
<?php if($needColorPickerScript) : ?>
            $(".colorSelector").each(function() {$(this).colorpicker()});
<?php endif; ?>

        var oldIndex,newIndex;
        $sortable.sortable({
            items: "tr.pill",
            handle: ".handle",
            placeholder: "ui-state-highlight",
            distance: 30,
            start: function(event, ui) {
                oldIndex= ui.item.parents("tbody").find("tr:not(.spacer)").index(ui.item);
            },
            update: function(event, ui) {
                newIndex= ui.item.parents("tbody").find("tr:not(.spacer)").index(ui.item);

                console.log(oldIndex, newIndex);

                var $view= $sortable.parents(".nav-pills:first");
                if($view.length==0) {
                    $view= $sortable.parents(".view:first");
                }
                console.log($view);
                $view.find(".sortable:gt(0)").each(function(i) {

                    var $originalItem= $(this).find("tbody tr:not(.spacer):eq("+(oldIndex)+")");
                    var $originalSpacer= $originalItem.next("tr.spacer");

                    var $clonedItem= $originalItem.clone(true);

                    $originalItem.remove();
                    $originalSpacer.remove();
                    var totalItems= $(this).find("tbody tr:not(.spacer)").length;

                    var $targetItem= $(this).find("tbody tr:not(.spacer):eq("+(newIndex)+")");
                    if(newIndex==0) {
                        var $firstItem= $(this).find("tbody tr:not(.spacer):first");
                        $clonedItem.insertBefore($firstItem);
                    }
                    else if(newIndex==totalItems) {
                        var $lastItem= $(this).find("tbody tr:not(.spacer):last");
                        $clonedItem.insertAfter($lastItem);
                    }
                    else if(newIndex>oldIndex) {
                        $clonedItem.insertBefore($targetItem);
                    }
                    else {
                        $clonedItem.insertBefore($targetItem);
                    }

                    $("<tr class='spacer'></tr>").insertAfter($clonedItem);

                });

                $sortable.find("tr.spacer").remove();
                $sortable.find("tr").after("<tr class='spacer'></tr>");

                var n=0;
                $sortable.find("tr:not(.spacer)").each(function() {
                    $(this).find(".ordr").val(n);
                    n++;
                })
            }
        });
        initSortable($sortable);

<?php if($this->enableAdd) : ?>

            $(".<?php echo $this->class; ?>-sortable-box").find("button.add").click(function() {

                $(".<?php echo $this->class; ?>-sortable-box").each(function(i) {
                    $sortable= $(this).find(".sortable");
                    $sortable.find("tbody tr:first").clone().appendTo($sortable);
                    $sortable.append($("<tr class='spacer'></tr>"));
                    var $new= $sortable.find("tbody tr:not(.spacer):last");

                    $(".boxy", $sortable).tooltip();
                    $(".boxy input[type='checkbox']", $sortable).change(function() {
                        var $this= $(this);
                        if($this.attr("checked")) $this.parent().addClass("active");
                        else $this.parent().removeClass("active");
                    });

                    var added= $sortable.attr("data-added") || 2;
                    $sortable.attr("data-added", parseInt(added)+1);
    <?php
    foreach($this->inputs as $input) {
        echo 'var $all_inputs= $new.find("input.' . $input['name'] . ', select.' . $input['name'] . '");';
        echo 'console.log($all_inputs);';
        echo 'var $without_hidden= $all_inputs.not("[type=\'hidden\']").not("[data-hard-disable=\'1\']");';
        echo '$all_inputs.attr("name", "' . $this->name . '[-"+added+"][' . $input['name'] . ']");';
        echo '$without_hidden.val("");';
    }
    ?>
                        $new.find("input.ordr").attr("name", "<?php echo $this->name; ?>[-"+added+"][ordr]");
                        $new.find("a.delete").removeAttr("data-original-title");
                        $new.find("a.delete span").removeClass("ui-icon-locked");
                        $new.find("a.delete span").addClass("ui-icon-close");
                        $new.find("a[href='#image-upload-modal']").remove();

                        //uniqueSelects();

                        // enable name field in case it was disabled
                        $new.find("input").not("[data-hard-disable='1']").removeAttr("disabled");
                        $new.find("select").not("[data-hard-disable='1']").removeAttr("disabled");
                        $new.find("a.delete").show();

                        var $newImage= $new.find(".photo");
                        $newImage.parent().css("opacity", "0.2");

                        if($newImage.length==1) {
                            $newImage.attr("data-image-id", "-"+added);
                            $newImage.css("background-image", $(".defaultImage .photo").css("background-image"));
                        }

                        var n=0;
                        $sortable.find("tr").each(function() {
                            $(this).find(".ordr").val(n);
                            n++;
                        });

                        initSortable($sortable);
                    });
                });
<?php endif; ?>
    });
</script>