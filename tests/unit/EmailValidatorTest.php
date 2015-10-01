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

        $variants = [
            ['mail@site.com', true],
            ['mail.dot@site.com', true],
            ['mail_site.com', false],
            ['mail@site', false],
            ['mail@123', false],
        ];

        foreach ($variants as $variant) {
            $email = $variant[0];
            $result = $variant[1];
            $this->assertEquals($validator->validate($email), $result);
        }
    }
}