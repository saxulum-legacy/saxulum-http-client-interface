<?php

namespace Saxulum\Tests\HttpClient;

use Saxulum\HttpClient\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $responseData
     * @param array $expected
     * @dataProvider responseProvider
     */
    public function testResponse($responseData, array $expected)
    {
        $reflectionClass = new \ReflectionClass('Saxulum\HttpClient\Response');

        /** @var Response $response */
        $response = $reflectionClass->newInstanceArgs($responseData);

        $this->assertEquals($expected['protocolVersion'], $response->getProtocolVersion());
        $this->assertEquals($expected['statusCode'], $response->getStatusCode());
        $this->assertEquals($expected['statusMessage'], $response->getStatusMessage());
        $this->assertEquals($expected['headers'], $response->getHeaders());
        $this->assertEquals($expected['content'], $response->getContent());
        $this->assertEquals($expected['plain'], (string) $response);

        foreach ($expected['headers'] as $headerName => $headerValue) {
            $this->assertEquals($headerValue, $response->getHeader($headerName));
        }

        $this->assertFalse($response->hasHeader('Test'));
        $this->assertEquals(null, $response->getHeader('Test', null));
    }

    /**
     * @return array
     */
    public function responseProvider()
    {
        return array(
            array(
                array(
                    '1.1',
                    200,
                    'OK',
                    array(
                        'Content-Type' => 'application/xhtml+xml',
                    ),
                    '<html><head><title>test</title></head><body><p>test</p></body></html>'
                ),
                array(
                    'protocolVersion' => '1.1',
                    'statusCode' => 200,
                    'statusMessage' => 'OK',
                    'headers' => array(
                        'Content-Type' => 'application/xhtml+xml',
                    ),
                    'content' => '<html><head><title>test</title></head><body><p>test</p></body></html>',
                    'plain' => "HTTP/1.1 200 OK\r\nContent-Type: application/xhtml+xml\r\n\r\n<html><head><title>test</title></head><body><p>test</p></body></html>\r\n\r\n"
                ),
            ),
            array(
                array(
                    '1.1',
                    404,
                    'NOT FOUND',
                    array(),
                    null
                ),
                array(
                    'protocolVersion' => '1.1',
                    'statusCode' => 404,
                    'statusMessage' => 'NOT FOUND',
                    'headers' => array(),
                    'content' => null,
                    'plain' => "HTTP/1.1 404 NOT FOUND\r\n\r\n"
                ),
            ),
        );
    }
}
