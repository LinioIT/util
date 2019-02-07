<?php

declare(strict_types=1);

namespace Linio\Component\Util;

use PHPUnit\Framework\TestCase;

class InflectorTest extends TestCase
{
    public function testIsPascalizingSpinalCase(): void
    {
        $this->assertEquals('MyTest', Inflector::pascalize('my-test'));
    }

    public function testIsPascalizingSnakeCase(): void
    {
        $this->assertEquals('MyTest', Inflector::pascalize('my_test'));
    }

    public function testIsPascalizingCustomCases(): void
    {
        $this->assertEquals('MyTest', Inflector::pascalize('my.test', '.'));
    }

    public function testIsCamelizing(): void
    {
        $this->assertEquals('myTest', Inflector::camelize('my-test'));
    }

    public function testIsCamelizingCustomCases(): void
    {
        $this->assertEquals('myTest', Inflector::camelize('my.test', '.'));
    }
}
