<?php

/**
 * Description of ExtendedBootInputHorizontal
 *
 * @author daniel.stojilovic
 */
Yii::import('bootstrap.widgets.input.BootInput');
Yii::import('bootstrap.widgets.input.BootInputHorizontal');

class ExtendedBootInputHorizontal extends BootInputHorizontal {
    
    /**
     * Renders a selectBox.
     * @return string the rendered content
     */
    protected function selectBox() {
        echo $this->getLabel() . '<div class="controls">';
        Yii::app()->controller->widget('FormSelectBox', array(
            'model' => $this->model,
            'attribute' => $this->attribute,
            'options' => $this->data,
            'htmlOptions' => $this->htmlOptions,
        ));
        echo $this->getError() . $this->getHint();
        echo '</div>';
    }
    
    protected function multiSelect() {        
        $class= get_class($this->model);
        $this->htmlOptions['encode']= false;
        
        echo $this->getLabel() . '<div class="controls">';
        Yii::app()->controller->widget('ext.multiselect.JMultiSelect', array(
            'name' => $class.'['.$this->attribute.'][]',
            'data' => $this->data['data'],
            'selected' => $this->data['selected'],
            'callback'=>'js:function(e, ui) {'.$this->data["callback"].'}',
            'htmlOptions' => $this->htmlOptions,
        ));
        echo $this->getError() . $this->getHint();
        echo '</div>'; 
    }

    protected function datePicker() {
        $this->htmlOptions['style'] = 'height:18px;';

        echo $this->getLabel() . '<div class="controls"><div class="input-append">';
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
        echo $this->getError() . $this->getHint();
        echo '</div></div>';
    }

    protected function timeField() {
        $rand = rand(1, 9999);
        $this->htmlOptions["id"] = "timeField_" . $rand;
        $this->htmlOptions["class"] .= " timeField";
        echo $this->getLabel() . '<div class="controls"><div class="input-append">';
        echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
        echo '<span class="add-on"><i class="icon-time"></i></span>';
        echo $this->getError() . $this->getHint();

        echo '</div></div>';
        echo "<script type='text/javascript'>\n
            $(\"#timeField_{$rand}\").mask('99:99');
        </script>";
    }
    
    protected function ckEditor() {
        //echo $this->getLabel() . '<div class="controls">';
        if($this->htmlOptions['width']==''){
            $this->htmlOptions['width'] = '650px';
        }
        
        Yii::app()->controller->widget('ext.ckeditor.CKEditorWidget',array(
            "model"=>$this->model,
            "attribute"=>$this->attribute,
            "defaultValue"=>$this->model->{$this->attribute},
            "config" => array(
                "toolbar"=>"IMS",
                //"toolbar_Basic"=> array(array('Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-', 'Image')),
                "width"=>$this->htmlOptions['width'],
                "extraPlugins"=>"ajax",
                "autoGrow_maxHeight"=>200,
                "height"=>'100%',
                "contentsCss" => Yii::app()->baseUrl."/css/style.css",
            )
         ));
        //echo $this->getError() . $this->getHint();
        //echo '</div>';
    }
    
    /**
	 * Renders a text field.
	 * @return string the rendered content
	 */
	protected function textField()
	{
		echo $this->getLabel();
        echo '<div class="controls">';
		echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getError().$this->getHint();
        if(isset($this->htmlOptions['help'])) {
            echo "<a style='margin-left:5px' href='#' rel='tooltip' title='".$this->htmlOptions['help']."'><i class='icon-question-sign'></i></a>";
        }
		echo '</div>';
	}

}

?>
