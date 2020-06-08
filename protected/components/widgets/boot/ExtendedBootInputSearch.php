<?php

/**
 * Description of ExtendedBootInputSearch
 *
 * @author daniel.stojilovic
 */
Yii::import('bootstrap.widgets.input.BootInput');
Yii::import('bootstrap.widgets.input.BootInputSearch');

class ExtendedBootInputSearch extends BootInputSearch {

    /**
     * Runs the widget.
     */
    public function run() {
        switch ($this->type) {
            case self::TYPE_CHECKBOX:
                $this->checkBox();
                break;

            case self::TYPE_CHECKBOXLIST:
                $this->checkBoxList();
                break;

            case self::TYPE_CHECKBOXLIST_INLINE:
                $this->checkBoxListInline();
                break;

            case self::TYPE_DROPDOWN:
                $this->dropDownList();
                break;

            case self::TYPE_FILE:
                $this->fileField();
                break;

            case self::TYPE_PASSWORD:
                $this->passwordField();
                break;

            case self::TYPE_RADIO:
                $this->radioButton();
                break;

            case self::TYPE_RADIOLIST:
                $this->radioButtonList();
                break;

            case self::TYPE_RADIOLIST_INLINE:
                $this->radioButtonListInline();
                break;

            case self::TYPE_TEXTAREA:
                $this->textArea();
                break;

            case self::TYPE_TEXT:
                $this->textField();
                break;

            case self::TYPE_CAPTCHA:
                $this->captcha();
                break;

            case self::TYPE_UNEDITABLE:
                $this->uneditableField();
                break;

            case "selectBox":
                $this->selectBox();
                break;

            case "datePicker":
                $this->datePicker();
                break;

            case "timeField":
                $this->timeField();
                break;

            case "ckEditor":
                $this->ckEditor();
                break;

            default:
                throw new CException(__CLASS__ . ': Failed to run widget! Type is invalid.');
        }
    }

    protected function textField() {
        if (isset($this->htmlOptions['class'])) {
            $this->htmlOptions['class'] .= ' search-query';
        } 
        else {
            $this->htmlOptions['class'] = 'search-query';
        }

        $this->htmlOptions['placeholder'] = $this->model->getAttributeLabel($this->attribute);
        echo "<div class='search_field'>" . $this->form->textField($this->model, $this->attribute, $this->htmlOptions) . "</div>";
        echo $this->getError() . $this->getHint();
    }

    protected function dropDownList() {
        if (isset($this->htmlOptions['class'])) {
            $this->htmlOptions['class'] .= ' search-query';
        } 
        else {
            $this->htmlOptions['class'] = 'search-query';
        }
        $this->htmlOptions['empty'] = "Select: " . $this->model->getAttributeLabel($this->attribute);
        echo "<div class='search_field'>" . $this->form->dropDownList($this->model, $this->attribute, $this->data, $this->htmlOptions) . "</div>";
    }

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

    protected function datePicker() {
        $this->htmlOptions['style'] = 'height:18px;';
        $this->htmlOptions['placeholder'] = $this->model->getAttributeLabel($this->attribute);
        if (isset($this->htmlOptions['class']))
            $this->htmlOptions['class'] .= ' search-query';
        else
            $this->htmlOptions['class'] = 'search-query';

        echo '<div class="input-append search_field">';
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
    }

    protected function timeField() {
        $rand = rand(1, 9999);
        $this->htmlOptions["id"] = "timeField_" . $rand;
        $this->htmlOptions["class"] .= " timeField";
        $this->htmlOptions['placeholder'] = $this->model->getAttributeLabel($this->attribute);
        if (isset($this->htmlOptions['class']))
            $this->htmlOptions['class'] .= ' search-query';
        else
            $this->htmlOptions['class'] = 'search-query';
        echo '<div class="input-append">';
        echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
        echo '<span class="add-on"><i class="icon-time"></i></span>';
        echo '</div>';
        echo "<script type='text/javascript'>\n
            $(\"#timeField_{$rand}\").mask('99:99');
        </script>";
    }

    protected function ckEditor() {
        Yii::app()->controller->widget('ext.ckeditor.CKEditorWidget', array(
            "model" => $this->model,
            "attribute" => $this->attribute,
            "defaultValue" => $this->model->{$this->attribute},
            "config" => array(
                "toolbar" => "Full",
                //"toolbar_Basic"=> array(array('Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-', 'Image')),
                "width" => "650px",
                "extraPlugins" => "ajax",
                "contentsCss" => Yii::app()->baseUrl . "/css/style.css",
            )
        ));
        echo $this->getError() . $this->getHint();
    }

}

?>
