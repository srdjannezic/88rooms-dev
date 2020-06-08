<?php

// change the following paths if necessary
$yii = 'framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/front.php';
//error_reporting(E_ALL);
error_reporting(0);
// remove the following line when in production mode
//defined('YII_DEBUG') or define('YII_DEBUG', true);  
//defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once(dirname(__FILE__) . '/protected/components/functions.php');
require_once($yii);
Yii::createWebApplication($config)->runEnd('front');
