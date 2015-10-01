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

    /**
     * @dataProvider getEmailVariants
     */
    public function testEmail($email, $result)
    {
        $validator = new EmailValidator();
        $this->assertEquals($validator->validate($email), $result);
    }

    public function getEmailVariants()
    {
        return [
            ['mail@site.com', true],
            ['mail.dot@site.com', true],
            ['mail_site.com', false],
            ['mail@site', false],
            ['mail@123', false],
        ];
    }
}