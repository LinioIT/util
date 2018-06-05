<?php

declare(strict_types=1);

namespace Linio\Component\Util;

use PHPUnit\Framework\TestCase;

class InflectorTest extends TestCase
{
    public function testIsPascalizingSpinalCase()
    {
        $this->assertEquals('MyTest', Inflector::pascalize('my-test'));
    }

    public function testIsPascalizingSnakeCase()
    {
        $this->assertEquals('MyTest', Inflector::pascalize('my_test'));
    }

    public function testIsPascalizingCustomCases()
    {
        $this->assertEquals('MyTest', Inflector::pascalize('my.test', '.'));
    }

    public function testIsCamelizing()
    {
        $this->assertEquals('myTest', Inflector::camelize('my-test'));
    }

    public function testIsCamelizingCustomCases()
    {
        $this->assertEquals('myTest', Inflector::camelize('my.test', '.'));
    }
}
