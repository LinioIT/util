<?php

declare(strict_types=1);

namespace Linio\Component\Util;

use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    public function testIsEncoding(): void
    {
        $encodedString = Json::encode(['foo' => 'bar']);
        $this->assertEquals('{"foo":"bar"}', $encodedString);
    }

    public function testIsDecoding(): void
    {
        $decodedData = Json::decode('{"foo":"bar"}');
        $this->assertEquals(['foo' => 'bar'], $decodedData);
    }

    public function testIsHandlingInvalidDataForEncode(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Resource types cannot be encoded');

        Json::encode(fopen('php://stdin', 'r'));
    }

    public function testIsHandlingEncodeFailure(): void
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Invalid JSON: Malformed UTF-8 characters, possibly incorrectly encoded');

        Json::encode("\xB1\x31");
    }

    public function testIsHandlingDecodeFailure(): void
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Invalid JSON: Syntax error on \'{"foo:"bar"}\'');

        Json::decode('{"foo:"bar"}');
    }

    public function testIsHandlingDecodeFailureWithLargePayload(): void
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Invalid JSON: Syntax error on \'{{"10":"foobar","11":"foobar","12":"foobar","13":"foobar","14":"foobar","15":"foobar","16":"foobar","17":"foobar","18":"foobar","19":"foobar","20":"foobar","21":"foobar","22":"foobar","23":"foobar","24":"foobar","25":"foobar","26":"foobar","27":"foobar","... (truncated)\'');

        Json::decode('{' . Json::encode(array_fill(10, 50, 'foobar')));
    }

    public function testIsAbleToDecodeEmptyJsonString(): void
    {
        $decodedData = Json::decode('{}');
        $this->assertEquals([], $decodedData);
    }

    public function testIsDecodingNullData(): void
    {
        $decodedData = Json::decode(null);
        $this->assertNull($decodedData);
    }

    public function testIsDecodingEmptyData(): void
    {
        $decodedData = Json::decode('');
        $this->assertNull($decodedData);
    }

    public function testIsDecodingFalse(): void
    {
        $decodedData = Json::decode(false);
        $this->assertNull($decodedData);
    }
}
