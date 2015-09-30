<?php

namespace tests;

require(__DIR__ . '/_bootstrap.php');

foreach (scandir(__DIR__ . '/unit') as $file) {
    if (substr($file, -8, 8) == 'Test.php') {
        $className = pathinfo($file, PATHINFO_FILENAME);
        $class = new \ReflectionClass('\tests\unit\\' . $className);
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
    }
}
