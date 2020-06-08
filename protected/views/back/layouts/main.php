<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php Yii::app()->bootstrap->register(); ?>
        <script>
            var baseUrl = "<?php echo Yii::app()->baseUrl; ?>/backend.php";
        </script>
        <link rel="icon" href="<?php echo Yii::app()->params['baseUrl']; ?>/images/favicon.ico" />
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/css/style_responsive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/css/style_default.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/css/metro.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/css/admin/dropzone.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['baseUrl']; ?>/vendor/colpick/css/colpick.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['baseUrl'] . 'js/admin/dropzone.js', CClientScript::POS_HEAD); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['baseUrl'] . 'js/admin/interface.js', CClientScript::POS_HEAD); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['baseUrl'] . 'js/admin/menu.js', CClientScript::POS_HEAD); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['baseUrl'] . 'js/breakpoints.js', CClientScript::POS_HEAD); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['baseUrl'] . 'js/jquery.cookie.js', CClientScript::POS_HEAD); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['baseUrl'] . 'vendor/colpick/js/colpick.js', CClientScript::POS_HEAD); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['baseUrl'] . 'js/main.js', CClientScript::POS_HEAD); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['baseUrl'] . 'js/user_form_ajax.js', CClientScript::POS_HEAD); ?>


    </head>

    <body class="fixed-top breakpoint-1280">

        <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'type' => 'inverse', // null or 'inverse'
            'brand' => "<span style='color:red'>CMS</span> administration",
            'brandUrl' => '/',
            'fluid' => true,
            'collapse' => true, // requires bootstrap-responsive.css
            'htmlOptions' => array('class' => 'header'),
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        //array('label' => Yii::app()->user->name, 'url' => '#'),
                        array('label' => Yii::app()->user->name, 'url' => '#', 'items' => array(
                                array('label' => __('Izmeni šifru'), 'url' => array("users/updatePassword")),
                                '---',
                                array('label' => __('Logout'), 'url' => Utility::createUrl("site/logout")),
                        )),
                    ),
                ),
            ),
        ));
        ?>
        <?php
        /*
          $this->widget('bootstrap.widgets.TbNavbar', array(
          'items' => array(
          array(
          'class' => 'bootstrap.widgets.TbMenu',
          'items' => array(
          array('label' => 'Home', 'url' => array('/site/index')),
          array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
          array('label' => 'Contact', 'url' => array('/site/contact')),
          array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
          array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
          ),
          ),
          ),
          "fluid" => true,
          "collapse" => true
          )); */
        ?>
        <?php echo $content; ?>
        <div class="clear"></div>
        <div class="footer">
            2013 © <?php echo Yii::app()->name; ?>.
            <div class="span pull-right">
                <span class="go-top"><i class="icon-angle-up"></i></span>
            </div>
        </div>
        <script>
            App.init();
        </script>
    </body>
</html>