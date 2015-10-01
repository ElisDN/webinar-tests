<?php

use yii\helpers\ArrayHelper;

return ArrayHelper::merge(
    require(__DIR__ . '/../../config/web.php'),
    require(__DIR__ . '/config.php')
);