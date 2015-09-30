<?php

namespace tests;

use app\models\User;
use Yii;

require(__DIR__ . '/_bootstrap.php');

class UserTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        User::deleteAll();
        Yii::$app->db->createCommand()->insert(User::tableName(), [
            'username' => 'user',
            'email' => 'user@email.com',
        ])->execute();
    }

    public function testValidateExistedValues()
    {
        $user = new User([
            'username' => 'user',
            'email' => 'user@email.com',
        ]);

        $this->assertFalse($user->validate(), 'model is not valid');
        $this->assertArrayHasKey('username', $user->getErrors(), 'check existed username error');
        $this->assertArrayHasKey('email', $user->getErrors(), 'check existed email error');
    }

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
        $test->setUp();
        $test->{$method->name}();
        $test->tearDown();
        echo PHP_EOL;
    }
}
