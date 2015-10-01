<?php

namespace tests\unit;

use Codeception\TestCase\Test;

class FutureTest extends Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @group future
     */
    public function testSomeFuture()
    {
        $this->markTestIncomplete();
    }

    public function testOtherFuture()
    {
        $this->markTestIncomplete();
    }

    /**
     * @group future
     */
    public function testSaveToMSSQL()
    {
        if (!extension_loaded('mssql')) {
            $this->markTestSkipped('The MSSQL extension is not available.');
        }
    }
}