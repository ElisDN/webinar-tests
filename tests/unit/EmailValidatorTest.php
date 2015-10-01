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

        $this->assertTrue($validator->validate('mail@site.com'));
        $this->assertTrue($validator->validate('mail.dot@site.com'));
        $this->assertFalse($validator->validate('mail_site.com'));
        $this->assertFalse($validator->validate('mail@site'));
        $this->assertFalse($validator->validate('mail@123'));
    }
}