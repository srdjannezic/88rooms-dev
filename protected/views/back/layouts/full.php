<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link rel="icon" href="<?php echo Yii::app()->params['baseUrl']; ?>/images/favicon.ico" />
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['baseUrl'] . 'js/interface.js', CClientScript::POS_HEAD); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['baseUrl'] . 'js/user_form_ajax.js', CClientScript::POS_HEAD); ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php Yii::app()->bootstrap->register(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/css/style_responsive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/css/style_default.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/css/metro.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/css/styles.css" />
    </head>
    <body class="login">
        <div class="logo">
            
        </div>
        <?php echo $content; ?>
        <div class="clear"></div>
    </body>
</html>