<?php /* EXPORT VIEW */ ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>  
        <?php echo Utility::inlineCss("export.css", false, true); ?>
    </head>
    <body>        
        <?php echo $content; ?>
    </body> 
</html>
 