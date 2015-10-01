<?php

namespace tests\unit;

use app\models\User;
use Codeception\Specify;
use Codeception\TestCase\Test;
use Yii;

class UserTest extends Test
{
    use Specify;

    /**
     * @var \UnitTester
     */
    protected $tester;

    public function _before()
    {
        User::deleteAll();
        Yii::$app->db->createCommand()->insert(User::tableName(), [
            'username' => 'user',
            'email' => 'user@email.com',
        ])->execute();
    }

    public function testValidateEmptyValues()
    {
        $user = new User();

        expect('model is not valid', $user->validate())->false();
        expect('username has error', $user->getErrors())->hasKey('username');
        expect('email has error', $user->getErrors())->hasKey('email');
    }

    public function testValidateWrongValues()
    {
        $user = new User();

        $user->username = 'Test User';
        $user->email = 'test_email.com';

        expect('model is not valid', $user->validate())->false();
        expect('username has error', $user->getErrors())->hasKey('username');
        expect('email has error', $user->getErrors())->hasKey('email');
    }

    public function testValidateExistedValues()
    {
        $user = new User();

        $user->username = 'user';
        $user->email = 'user@email.com';

        expect('model is not valid', $user->validate())->false();
        expect('username has error', $user->getErrors())->hasKey('username');
        expect('email has error', $user->getErrors())->hasKey('email');
    }

    public function testValidateCorrectValues()
    {
        $user = new User();

        $user->username = 'TestUser';
        $user->email = 'test@email.com';

        expect('model is not valid', $user->validate())->true();
    }

    public function testSaveIntoDatabase()
    {
        $user = new User([
            'username' => 'TestUsername',
            'email' => 'test@email.com',
        ]);

        expect('model is saved', $user->save())->true();
    }
}