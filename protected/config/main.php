<?php
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Weee CMS',
    'import' => array(
        'application.components.*',
    ),
    'defaultController' => 'pages/main/index',
    'components' => array(
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'page/<url:\w+>' => 'pages/main/view',
                '<controller>/<id:\d+>' => '<controller>/view',
                '<controller>/<action>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=weee',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'weee_',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        ),
    ),
    'modules' => array(
        'pages',
    )
);