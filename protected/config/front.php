<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
            'defaultController' => 'site',
            'language' => 'en',
            'theme' => '88rooms',
            'components' => array(
                'iwi' => array(
                    'class' => 'ext.iwi.IwiComponent',
                    // GD or ImageMagick
                    'driver' => 'GD',
                // ImageMagick setup path
                //'params'=>array('directory'=>'C:/ImageMagick'),
                ),
                'urlManager' => array(
                    //'class'=>'application.components.UrlManager',
                    'class' => 'ext.localeurls.LocaleUrlManager',
                    'languageParam' => '_lang',
                    'urlFormat' => 'path',
                    'showScriptName' => false,
                    'rules' => array(
                        '/'=>'site/index',
                        //'<language:(de|tr|en)>/' => 'site/index',
                        //'<controller:\w+>/<id:\d+>' => '<controller>/view',
                        //'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                        //'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                        //'<controller:\w+>' => '<controller>/index',
                        //'user/activation/<key:[a-z0-9]+>' => 'user/activation',
                        //'book-now' => 'site/bookNow',
                        'book-now/<id:\d+>' => 'site/bookNow',
                        'book-now/' => 'site/bookNow',
                        'news/<slug:[\w\-]+>' => 'news/view',
                        'rooms/<slug:[\w\-]+>' => 'rooms/view',
                        'special-offers/<slug:[\w\-]+>' => 'specialOffers/view',
                        'belgrade-offers/<slug:[\w\-]+>' => 'cityOffers/view',
                        'page/<slug:[\w\-]+>' => 'page/index',
                    //'page/<alias>' => 'page/index',
                    ),
                ),
                'request' => array(
                    'class' => 'ext.localeurls.LocaleHttpRequest',
                    'redirectDefault' => false
                )
            )
                )
);
?> 
