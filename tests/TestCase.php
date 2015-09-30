<?php

namespace tests;

class TestCase
{
    public function setUp()
    {

    }

    public function tearDown()
    {

    }

    protected function assert($condition, $message = '')
    {
        echo $message;
        if ($condition === true) {
            echo ' Ok' . PHP_EOL;
        } else {
            echo ' Fail' . PHP_EOL;
            exit();
        }
    }

    protected function assertTrue($condition, $message = '')
    {
        $this->assert($condition === true, $message);
    }

    protected function assertFalse($condition, $message = '')
    {
        $this->assert($condition === false, $message);
    }

    protected function assertArrayHasKey($key, $array, $message = '')
    {
        $this->assert(array_key_exists($key, $array), $message);
    }
}