<?php

namespace tests;

use app\models\User;

require(__DIR__ . '/_bootstrap.php');

class UserTest
{
    protected function assert($condition, $message = '')
    {
        echo $message;
        if ($condition === true) {
            echo ' Ok' . PHP_EOL;
        } else {
            echo ' Fail' . PHP_EOL;
            exit();
        }
    }

    protected function assertTrue($condition, $message = '')
    {
        $this->assert($condition === true, $message);
    }

    protected function assertFalse($condition, $message = '')
    {
        $this->assert($condition === false, $message);
    }

    protected function assertArrayHasKey($key, $array, $message = '')
    {
        $this->assert(array_key_exists($key, $array), $message);
    }

    public function testValidateEmptyValues()
    {
        $user = new User();

        $this->assertFalse($user->validate(), 'model is not valid');
        $this->assertArrayHasKey('username', $user->getErrors(), 'check username error');
        $this->assertArrayHasKey('email', $user->getErrors(), 'check email error');
    }
}

$test = new UserTest();
$test->testValidateEmptyValues();
