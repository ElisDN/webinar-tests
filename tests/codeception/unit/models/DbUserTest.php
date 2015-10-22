<?php

namespace tests\unit;

use app\models\DbUser;
use Codeception\Specify;
use tests\codeception\fixtures\UserFixture;
use Yii;
use yii\codeception\DbTestCase;

/**
 * @property array $users
 */
class DbUserTest extends DbTestCase
{
    use Specify;

    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var DbUser
     */
    private $user;

    public function _before()
    {
        $this->user = new DbUser();
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
            $this->user->username = 'Test DbUser';
            $this->user->email = 'test_email.com';
            expect('model is not valid', $this->user->validate())->false();
            expect('username has error', $this->user->getErrors())->hasKey('username');
            expect('email has error', $this->user->getErrors())->hasKey('email');
        });

        $this->specify('fields are unique', function() {
            $this->user->username = $this->users[0]['username'];
            $this->user->email = $this->users[0]['email'];
            expect('model is not valid', $this->user->validate())->false();
            expect('username has error', $this->user->getErrors())->hasKey('username');
            expect('email has error', $this->user->getErrors())->hasKey('email');
        });

        $this->specify('fields are correct', function() {
            $this->user->username = 'TestDbUser';
            $this->user->email = 'test@email.com';
            expect('model is not valid', $this->user->validate())->true();
        });
    }

    public function testSaveIntoDatabase()
    {
        $user = new DbUser([
            'username' => 'TestDbUsername',
            'email' => 'test@email.com',
        ]);

        expect('model is saved', $user->save())->true();
    }

    public function fixtures()
    {
        return [
            'users' => [
                'class' => UserFixture::className(),
                //'dataFile' => '@tests/codeception/fixtures/data/user.php',
            ],
        ];
    }
}