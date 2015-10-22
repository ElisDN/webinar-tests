<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$config = require(__DIR__ . '/../config/web.php');

$application = new yii\web\Application($config);

echo Yii::$app->name . PHP_EOL;