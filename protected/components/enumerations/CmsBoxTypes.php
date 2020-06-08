<?php

/**
 * Description of CmsBoxTypes
 *
 * @author Nikola
 */
class CmsBoxTypes {

    const CMS_PAGE = 'page';
    const CMS_CUSTOM = 'custom';
    const CMS_LINK = 'link';
    const CMS_MENU = 'menu';

    public static function types() {
        return array("page" => self::CMS_PAGE, "custom" => self::CMS_CUSTOM/*, "link" => self::CMS_LINK, "menu" => self::CMS_MENU*/);
    }

}