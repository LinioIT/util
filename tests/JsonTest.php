<?php

namespace Linio\Component\Util;

class JsonTest extends \PHPUnit_Framework_TestCase
{
    public function testIsEncoding()
    {
        $encodedString = Json::encode(['foo' => 'bar']);
        $this->assertEquals('{"foo":"bar"}', $encodedString);
    }

    public function testIsDecoding()
    {
        $decodedData = Json::decode('{"foo":"bar"}');
        $this->assertEquals(['foo' => 'bar'], $decodedData);
    }

    /**
     * @expectedException \LogicException
     */
    public function testIsHandlingEncodeFailure()
    {
        Json::encode(fopen('php://stdin', 'r'));
    }

    /**
     * @expectedException \LogicException
     */
    public function testIsHandlingDecodeFailure()
    {
        Json::decode('{"foo:"bar"}');
    }

    public function testIsAbleToDecodeEmptyJsonString()
    {
        $decodedData = Json::decode('{}');
        $this->assertEquals([], $decodedData);
    }
}
