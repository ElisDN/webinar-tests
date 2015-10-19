<?php

use yii\helpers\ArrayHelper;

$_SERVER['SCRIPT_FILENAME'] = YII_TEST_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = YII_TEST_ENTRY_URL;

return ArrayHelper::merge(
    require(__DIR__ . '/../../../config/web.php'),
    require(__DIR__ . '/../config/config.php'),
    [
        'components' => [
            'request' => [
                'enableCsrfValidation' => false,
            ],
        ],
    ]
);