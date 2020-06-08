<?php

Yii::import('zii.widgets.CMenu');

class FlatMenu extends CMenu {

    public $activateItemsOuter = true;

    //need to include this for our function to run
    public function run() {
        $this->renderMenu($this->items);
    }

    protected function renderMenuRecursive($items) {
        $count = 0;
        $n = count($items);
        foreach ($items as $item) {
            $count++;
            $options = isset($item['itemOptions']) ? $item['itemOptions'] : array();
            $class = array();
            if (($item['active'] && $this->activeCssClass != '') || strpos($item['url'], Yii::app()->controller->id.'/'.Yii::app()->controller->action->id)) {
                if ($this->activateItemsOuter) {
                    $class [] = $this->activeCssClass;
                } else {
                    if (isset($item['linkOptions'])) {
                        $item['linkOptions'] = array('class' => $item['linkOptions']['class'] . ' ' . $this->activeCssClass);
                    } else {
                        $item['linkOptions'] = array('class' => $this->activeCssClass);
                    }
                }
            }
            if ($count === 1 && $this->firstItemCssClass != '')
                $class [] = $this->firstItemCssClass;
            if ($count === $n && $this->lastItemCssClass != '')
                $class [] = $this->lastItemCssClass;
            if ($class !== array()) {
                if (empty($options['class']))
                    $options['class'] = implode(' ', $class);
                else
                    $options['class'] .= ' ' . implode(' ', $class);
            }
            echo CHtml :: openTag('li', $options);
            if (isset($item['url'])) {
                $icon = !empty($item['icon']) ? "<i class='icon-" . $item['icon'] . "'></i>" : "";
                $label = $icon . "<span class='title'>" . $item['label'] . "</span>";
                $label = isset($item['items']) ? $label . "<span class='arrow " . (($item['active']) ? "open" : "") . "'></span>" : $label;
                $menu = CHtml :: link($label, $item['url'], isset($item['linkOptions']) ? $item['linkOptions'] : array());
            } else {
                $menu = CHtml :: tag('span', isset($item['linkOptions']) ? $item['linkOptions'] : array(), $item['label']);
            }
            if (isset($this->itemTemplate) || isset($item['template'])) {
                $template = isset($item['template']) ? $item['template'] : $this->itemTemplate;
                echo strtr($template, array('{menu}' => $menu));
            }
            else
                echo $menu;
            if (isset($item['items']) && count($item['items'])) {
                echo "\n" . CHtml :: openTag('ul', $this->submenuHtmlOptions) . "\n";
                $this->renderMenuRecursive($item['items']);
                echo CHtml :: closeTag('ul') . "\n";
            }
            echo CHtml :: closeTag('li') . "\n";
        }
    }

}