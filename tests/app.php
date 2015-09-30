<?php

namespace tests;

use app\models\User;

require(__DIR__ . '/_bootstrap.php');

class UserTest extends TestCase
{
    public function testSaveIntoDatabase()
    {
        $user = new User([
            'username' => 'TestUsername',
            'email' => 'test@email.com',
        ]);

        $this->assertTrue($user->save(), 'model is saved');
    }
}

$class = new \ReflectionClass('\tests\UserTest');
foreach($class->getMethods() as $method) {
    if (substr($method->name, 0, 4) == 'test') {
        echo 'Test ' . $method->class . '::' . $method->name . PHP_EOL . PHP_EOL;
        /** @var TestCase $test */
        $test = new $method->class;
        $test->{$method->name}();
        echo PHP_EOL;
    }
}
