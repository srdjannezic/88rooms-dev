<?php

/**
 * Description of ContactPhoto
 * @author daniel.stojilovic
 * 
 * This is a widget that shows a photo of the contact entity
 * @property string $photo This is the PHOTO database field, containing the filename
 * of the photo without the path
 * 
 */
class OrganizationLogo extends ContactPhoto {
    public $id;
    public $url;
    
    public function init() {
        $this->url= Yii::app()->createUrl("/files/organizationLogo", array("id"=>$this->id));
    }
}

?>
