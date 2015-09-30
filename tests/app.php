<?php

namespace tests;

use app\models\User;

require(__DIR__ . '/_bootstrap.php');

$user = new User();

$user->username = 'ElisDN';
$user->email = 'mail@elisdn.ru';

print_r($user->getAttributes());