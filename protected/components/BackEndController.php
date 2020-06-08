<?php

/**
 * Description of BackEndController
 *
 * @author rado
 */
class BackEndController extends RController {

    //public $layout = 'main';
    public $layout = 'column1';
    public $offer_count;
    public $message_count;
    public $carrier_count;
    public $advertiser_count;
    public $ad_count;
    public $title = "";
    public $description = "";

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function filters() {
        return array('rights');
    }

    public function allowedActions() {
        return 'login, logout, error, SiteIndex';
    }

}

?>
