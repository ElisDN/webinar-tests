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

    /**
     * @var User
     */
    private $user;

    public function _before()
    {
        $this->user = new User();
    }

    public function testValidation()
    {
        $this->specify('fields are required', function() {
            $this->user->username = null;
            $this->user->email = null;
            expect('model is not valid', $this->user->validate())->false();
            expect('username has error', $this->user->getErrors())->hasKey('username');
            expect('email has error', $this->user->getErrors())->hasKey('email');
        });

        $this->specify('fields are wrong', function() {
            $this->user->username = 'Test User';
            $this->user->email = 'test_email.com';
            expect('model is not valid', $this->user->validate())->false();
            expect('username has error', $this->user->getErrors())->hasKey('username');
            expect('email has error', $this->user->getErrors())->hasKey('email');
        });

        $this->specify('fields are unique', function() {
            $this->user->username = 'user';
            $this->user->email = 'user@email.com';
            expect('model is not valid', $this->user->validate())->false();
            expect('username has error', $this->user->getErrors())->hasKey('username');
            expect('email has error', $this->user->getErrors())->hasKey('email');
        });

        $this->specify('fields are correct', function() {
            $this->user->username = 'TestUser';
            $this->user->email = 'test@email.com';
            expect('model is not valid', $this->user->validate())->true();
        });

        //expect('', array_filter($this->user->getAttributes()))->equals([]);
    }

    public function testSaveIntoDatabase()
    {
        $user = new User([
            'username' => 'TestUsername',
            'email' => 'test@email.com',
        ]);

        expect('model is saved', $user->save())->true();

        $this->tester->seeInDatabase('user', [
            'username' => 'TestUsername',
            'email' => 'test@email.com',
        ]);
    }
}