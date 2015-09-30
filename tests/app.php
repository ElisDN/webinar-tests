<?php

namespace tests;

use app\models\User;

require(__DIR__ . '/_bootstrap.php');

class UserTest
{
    public function testValidateEmptyValues()
    {
        $user = new User();

        echo 'validate empty username and email';
        if ($user->validate() == false) {
            echo ' Ok' . PHP_EOL;
        } else {
            echo ' Fail' . PHP_EOL;
            exit();
        }

        echo 'check empty username error';
        if (array_key_exists('username', $user->getErrors())) {
            echo ' Ok' . PHP_EOL;
        } else {
            echo ' Fail' . PHP_EOL;
            exit();
        }

        echo 'check empty email error';
        if (array_key_exists('email', $user->getErrors())) {
            echo ' Ok' . PHP_EOL;
        } else {
            echo ' Fail' . PHP_EOL;
            exit();
        }
    }
}

$test = new UserTest();
$test->testValidateEmptyValues();
