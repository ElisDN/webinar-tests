<?php

namespace tests\unit;

use Codeception\TestCase\Test;
use yii\validators\EmailValidator;

class EmailValidatorTest extends Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testEmail()
    {
        $validator = new EmailValidator();

        $this->assertEquals($validator->validate('mail@site.com'), true);
        $this->assertEquals($validator->validate('mail.dot@site.com'), true);
        $this->assertEquals($validator->validate('mail_site.com'), false);
        $this->assertEquals($validator->validate('mail@site'), false);
        $this->assertEquals($validator->validate('mail@123'), false);
    }
}