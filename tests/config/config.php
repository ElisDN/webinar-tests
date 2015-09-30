<?php

return [
    'language' => 'en-US',
    'components' => [
        'db' => [
            'dsn' => 'sqlite:' . __DIR__ . '/../../data/test.db',
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
    ],
];