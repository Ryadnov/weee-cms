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
                // Module Pages
                'page/<url:\w+>' => 'pages/main/view',
                
                // Module Blogs
                'blogs/list'     => 'blogs/blog/index',
                'blog/<url:\w+>' => 'blogs/blog/view',
                'topic/add'      => 'blogs/post/create',
                'topic/edit'     => 'blogs/post/update',
                'topic/<id:\d+>' => 'blogs/post/view',
                'topics'         => 'blogs/post/index',
                
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
        'authManager' => array(
            'class' => 'PhpAuthManager',
        ),
        'user' => array(
            'class' => 'WebUser',
            'loginUrl' => array('/users/main/login'),
            'allowAutoLogin' => true,
        ),
    ),
    'modules' => array('pages', 'users', 'blogs',)
);