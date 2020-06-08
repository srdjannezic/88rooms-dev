<?php

$yii = 'framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/back.php';
error_reporting(0);
// Remove the following lines when in production mode
//defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
require_once(dirname(__FILE__) . '/protected/components/functions.php');
require_once($yii);
Yii::createWebApplication($config)->runEnd('back');