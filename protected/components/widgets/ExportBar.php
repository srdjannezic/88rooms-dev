<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExportBar
 *
 * @author daniel.stojilovic
 */
class ExportBar extends CWidget {
    public $url;
    
    public function run() {
        $this->render("exportBar");
    }
}

?>
