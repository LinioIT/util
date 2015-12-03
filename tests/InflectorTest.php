<?php

namespace Linio\Component\Util;

class InflectorTest extends \PHPUnit_Framework_TestCase
{
    public function testIsPascalizingSpinalCase()
    {
        $this->assertEquals('MyTest', Inflector::pascalize('my-test'));
    }

    public function testIsPascalizingSnakeCase()
    {
        $this->assertEquals('MyTest', Inflector::pascalize('my_test'));
    }

    public function testIsCamelizing()
    {
        $this->assertEquals('myTest', Inflector::camelize('my-test'));
    }
}
