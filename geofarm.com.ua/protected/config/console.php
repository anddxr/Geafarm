<?php
// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Console Application',
    // preloading 'log' component
    'preload' => array('log'),
    // application components
    'components' => array(
        // database settings are configured in database.php
        'db' => array(
            'connectionString' => 'mysql:host=89.21.86.20;dbname=evgeniy_tracktor',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'Yte0nmtfkz',
            'charset' => 'utf8',
            'tablePrefix' => '',
//            'enableProfiling' => true,
//            'enableParamLogging' => true,
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
);
