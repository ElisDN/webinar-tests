<?php

namespace tests;

use app\models\User;

require(__DIR__ . '/_bootstrap.php');

class UserTest
{
    protected function assert($condition, $message = '')
    {
        echo $message;
        if ($condition) {
            echo ' Ok' . PHP_EOL;
        } else {
            echo ' Fail' . PHP_EOL;
            exit();
        }
    }

    public function testValidateEmptyValues()
    {
        $user = new User();

        $this->assert($user->validate() == false, 'model is not valid');
        $this->assert(array_key_exists('username', $user->getErrors()), 'check username error');
        $this->assert(array_key_exists('email', $user->getErrors()), 'check email error');
    }
}

$test = new UserTest();
$test->testValidateEmptyValues();
