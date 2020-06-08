<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BreadCrumbs
 *
 * @author daniel.stojilovic
 */
Yii::import('ext.bootstrap.widgets.BootCrumb');
class BreadCrumbs extends BootCrumb {
    
    public function init() {
        $this->htmlOptions= array("class"=>"nav");
        $this->homeLink= null;
    }
    
    /**
	 * Renders a single breadcrumb item.
	 * @param string $content the content.
	 * @param boolean $active whether the item is active.
	 * @return string the markup.
	 */
	protected function renderItem($content, $active=false)
	{
		//$separator = !$active ? '<span class="divider">'.$this->separator.'</span>' : '';
		
		ob_start();
		echo CHtml::openTag('li', $active ? array('class'=>'active') : array());
		echo $content; //.$separator;
		echo '</li>';
		return ob_get_clean();
	}
}

?>
