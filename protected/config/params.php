<?php

// this contains the application parameters that can be maintained via GUI
return array(
    // this is displayed in the header section
    'title' => '88 Rooms',
    'page_title_prefix' => '88 Rooms',
    // number of posts displayed per page
    'postsPerPage' => 10,
    // maximum number of comments that can be displayed in recent comments portlet
    'recentCommentCount' => 10,
    'baseUrl' => 'https://88rooms.com/',
    'bookingBaseUrl' => 'https://88rooms.com/book-now/',//'https://109.111.235.86',
    'base_upload_path' => dirname(__FILE__).'/../../uploads/medias/',
    // maximum number of tags that can be displayed in tag cloud portlet
    'tagCloudCount' => 20,
    // whether post comments need to be approved before published
    'commentNeedApproval' => true,
    // the copyright information displayed in the footer section
    'copyrightInfo' => 'Copyright &copy; 2014 by 88 Rooms.',
    'thumb_w' => 200,
    'thumb_h' => 140,
    'defaultLanguage' => 'en',
    'currency' => '&euro;'
);
