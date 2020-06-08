<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExtendedBootInput
 *
 * @author daniel.stojilovic
 */
abstract class ExtendedBootInput extends BootInput {
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
            
            case "multiSelect":
                $this->multiSelect();
                break;

            default:
                throw new CException(__CLASS__ . ': Failed to run widget! Type is invalid.');
        }
    }

}

?>
