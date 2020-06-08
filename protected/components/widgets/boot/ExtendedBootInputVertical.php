<?php

/**
 * Description of ExtendedBootInputHorizontal
 *
 * @author daniel.stojilovic
 */
Yii::import('bootstrap.widgets.input.BootInput');
Yii::import('bootstrap.widgets.input.BootInputVertical');

class ExtendedBootInputVertical extends BootInputVertical {

    /**
     * Renders a selectBox.
     * @return string the rendered content
     */
    protected function selectBox() {
        echo $this->getLabel();
        Yii::app()->controller->widget('FormSelectBox', array(
            'model' => $this->model,
            'attribute' => $this->attribute,
            'options' => $this->data,
            'htmlOptions' => $this->htmlOptions,
        ));
        echo $this->getError() . $this->getHint();
    }

    protected function datePicker() {
        $this->htmlOptions['style'] = 'height:18px;';

        echo $this->getLabel();
        echo '<div class="input-append">';
        Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $this->model,
            'attribute' => $this->attribute,
            'language' => 'en-GB',
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'dd-mm-yy',
            ),
            'htmlOptions' => $this->htmlOptions
        ));
         echo '<span class="add-on"><i class="icon-calendar"></i></span>';
         echo '</div>';
        echo $this->getError() . $this->getHint();
    }

    protected function timeField() {
        $rand = rand(1, 9999);
        $this->htmlOptions["id"] = "timeField_" . $rand;
        $this->htmlOptions["class"] .= " timeField";
        echo $this->getLabel().'<div class="input-append">';
        echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
        echo '<span class="add-on"><i class="icon-time"></i></span>';
        echo '</div>';
        echo $this->getError() . $this->getHint();

        echo "<script type='text/javascript'>\n
            $(\"#timeField_{$rand}\").mask('99:99');
        </script>";
    }
    
    protected function ckEditor() {
        echo $this->getLabel();
        Yii::app()->controller->widget('ext.ckeditor.CKEditorWidget',array(
            "model"=>$this->model,
            "attribute"=>$this->attribute,
            "defaultValue"=>$this->model->{$this->attribute},
            "config" => array(
                "toolbar"=>"Full",
                //"toolbar_Basic"=> array(array('Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-', 'Image')),
                "width"=>"650px",
                "extraPlugins"=>"ajax",
                "contentsCss" => Yii::app()->baseUrl."/css/style.css",
            )
         ));
        echo $this->getError() . $this->getHint();
    }

}

?>
