<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

require(dirname(__DIR__) . '/vendor/autoload.php');
require(dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php');
require(dirname(__DIR__) . '/helpers/site.php');

$config = require(dirname(__DIR__) . '/config/web.php');

(new yii\web\Application($config))->run();
