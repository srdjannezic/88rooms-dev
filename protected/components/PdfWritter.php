<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PdfWritter
 *
 * @author nikola.ristivojevic
 * @property DOMPDF $pdf
 */
//require_once(Yii::app()->basePath . "/components/dompdf/dompdf_config.inc.php");
Yii::import('application.components.dompdf.dompdf_config.inc');
Yii::import('application.extensions.pdf.dompdf.*');
require_once(dirname(__FILE__).'/dompdf/dompdf_config.inc.php');
class PdfWritter {

    private $pdf;
    private $html;
    private $filename = "pdf";

    public function __construct($filename, $html = null, Contact $contact = null) {
        
        $this->pdf = new  DOMPDF();
        $this->pdf->set_paper('a4', 'portrait');
        $this->addHtml(Utility::inlineCss("export.css", false, true));

        $this->filename = $filename;

        if (isset($html)) {
            $this->addHtml($html);
        }
    }

    public function setOrientation($orientation="portrait") {
        $this->pdf->set_paper("a4", $orientation);
    }

    /**
     * @property integer $type For contacts use 1, for organizations use 2
     */
    public function addHtml($str, $newPage = false) {
        //Utility::dump($newPage);

        if($newPage == true){
            $this->html .= '<div style="page-break-after:always;">';
        }

        $this->html.= $str;

        if($newPage == true){
            $this->html .='</div>';
        }
    }

    public function output($attachment = FALSE, $processPlaceholders = true) {        
       
        $this->pdf->load_html($this->html);       
        $this->pdf->render();
        if (!$attachment) {
            $this->pdf->stream($this->filename . ".pdf", array("Attachment" => false));
        } else {
            return (string)$this->pdf->output();
        }
    }

    public function __toString() {
        return $this->html;
    }

}