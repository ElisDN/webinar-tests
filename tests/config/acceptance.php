<?php

use yii\helpers\ArrayHelper;

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

return ArrayHelper::merge(
    require(__DIR__ . '/../../config/web.php'),
    require(__DIR__ . '/../config/config.php')
);