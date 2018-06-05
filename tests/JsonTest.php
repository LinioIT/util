<?php

declare(strict_types=1);

namespace Linio\Component\Util;

use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
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
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Resource types cannot be encoded
     */
    public function testIsHandlingInvalidDataForEncode()
    {
        Json::encode(fopen('php://stdin', 'r'));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Invalid JSON: Malformed UTF-8 characters, possibly incorrectly encoded
     */
    public function testIsHandlingEncodeFailure()
    {
        Json::encode("\xB1\x31");
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Invalid JSON: Syntax error on '{"foo:"bar"}'
     */
    public function testIsHandlingDecodeFailure()
    {
        Json::decode('{"foo:"bar"}');
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Invalid JSON: Syntax error on '{{"10":"foobar","11":"foobar","12":"foobar","13":"foobar","14":"foobar","15":"foobar","16":"foobar","17":"foobar","18":"foobar","19":"foobar","20":"foobar","21":"foobar","22":"foobar","23":"foobar","24":"foobar","25":"foobar","26":"foobar","27":"foobar","... (truncated)'
     */
    public function testIsHandlingDecodeFailureWithLargePayload()
    {
        Json::decode('{' . Json::encode(array_fill(10, 50, 'foobar')));
    }

    public function testIsAbleToDecodeEmptyJsonString()
    {
        $decodedData = Json::decode('{}');
        $this->assertEquals([], $decodedData);
    }

    public function testIsDecodingNullData()
    {
        $decodedData = Json::decode(null);
        $this->assertNull($decodedData);
    }

    public function testIsDecodingEmptyData()
    {
        $decodedData = Json::decode('');
        $this->assertNull($decodedData);
    }

    public function testIsDecodingFalse()
    {
        $decodedData = Json::decode(false);
        $this->assertNull($decodedData);
    }
}
