<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
            'homeUrl' => array('site/index'),
            'language' => 'en',
            'name' => 'Admin Panel',
            'modules' => array(
                'rights' => array(                    
                    'install' => false,
                    'superuserName' => 'Admin',
                    'appLayout' => 'application.views.back.layouts.column2',
                ),
            ),
            'components' => array(
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => true,
                    'rules' => array(
                        //'backend' => 'site/index',
                        //'backend/<_c>' => '<_c>',
                        //'backend/<_c>/<_a>' => '<_c>/<_a>',
                    ),
                ),
                'bootstrap' => array(
                    'class' => 'bootstrap.components.Bootstrap',
                    'responsiveCss' => false
                ),
                'user' => array(
                    // enable cookie-based authentication
                    'allowAutoLogin' => true,
                    'class' => 'RWebUser',
                ),
                'authManager' => array(
                    'class' => 'RDbAuthManager',
                    'connectionID' => 'db',
                    'assignmentTable' => 'authassignment',
                    'itemChildTable' => 'authitemchild',
                    'itemTable' => 'authitem',
                    'defaultRoles' => array('Authenticated', 'Guest'),
                ),
            ),
                )
);
?>
