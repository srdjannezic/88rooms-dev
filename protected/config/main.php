<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => '88 Rooms',
    'charset' => 'UTF-8',
    // preloading 'log' component
    'preload' => array('log', 'bootstrap'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.components.widgets.*',
        'application.components.enumerations.*',
        'application.controllers.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
        'application.extensions.chosen.*',
    ),
    //'defaultController' => 'site',
    //'theme' => 'bootstrap', // requires you to copy the theme under your themes directory
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '88rooms20!r',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            //'ipFilters' => array('127.0.0.1', '188.93.81.77', '*'),
            'ipFilters' => array('127.0.0.1', '::1', '130.180.244.7'),
            'generatorPaths' => array(
                'bootstrap.gii', // since 0.9.1
            //'application.gii',
            ),
        ),
    ),
    // application components
    'components' => array(
        'shortcode' => array(
            'class' => 'application.extensions.yii-shortcode.ShortCode',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
            'responsiveCss' => false
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=mysql;dbname=roomscom_88rooms',
            'emulatePrepare' => true,
            'username' => 'roomscom_user',
            'password' => 'kw[(wXc61MuT',
            'charset'=>'utf8',
            'tablePrefix' => '',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages

            /* array(
              'class'=>'CWebLogRoute',
              ), */
            ),
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/params.php'),
    'behaviors' => array(
        'runEnd' => array(
            'class' => 'application.components.WebApplicationEndBehavior',
        ),
    ),
);
