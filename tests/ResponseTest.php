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

        foreach ($expected['headers'] as $headerName => $headerValue) {
            $this->assertEquals($headerValue, $response->getHeader($headerName));
        }
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
                    'content' => '<html><head><title>test</title></head><body><p>test</p></body></html>'
                ),
                array(
                    '1.1',
                    200,
                    'OK'
                ),
                array(
                    'protocolVersion' => '1.1',
                    'statusCode' => 200,
                    'statusMessage' => 'OK',
                    'headers' => array(),
                    'content' => null
                ),
            ),
        );
    }
}
