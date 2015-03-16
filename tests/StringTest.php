<?php

namespace Linio\Component\Util;

class StringTest extends \PHPUnit_Framework_TestCase
{
    public function testIsPascalizingSpinalCase()
    {
        $this->assertEquals('MyTest', String::pascalize('my-test'));
    }

    public function testIsPascalizingSnakeCase()
    {
        $this->assertEquals('MyTest', String::pascalize('my_test'));
    }

    public function testIsCamelizing()
    {
        $this->assertEquals('myTest', String::camelize('my-test'));
    }
}
