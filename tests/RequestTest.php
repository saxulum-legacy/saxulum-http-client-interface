<?php

namespace Saxulum\Tests\HttpClient;

use Saxulum\HttpClient\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $requestData
     * @param array $expected
     * @dataProvider requestProvider
     */
    public function testRequest($requestData, array $expected)
    {
        $reflectionClass = new \ReflectionClass('Saxulum\HttpClient\Request');

        /** @var Request $request */
        $request = $reflectionClass->newInstanceArgs($requestData);

        $this->assertEquals($expected['protocolVersion'], $request->getProtocolVersion());
        $this->assertEquals($expected['method'], $request->getMethod());
        $this->assertEquals($expected['url'], (string) $request->getUrl());
        $this->assertEquals($expected['headers'], $request->getHeaders());
        $this->assertEquals($expected['content'], $request->getContent());

        foreach ($expected['headers'] as $headerName => $headerValue) {
            $this->assertEquals($headerValue, $request->getHeader($headerName));
        }
    }

    /**
     * @return array
     */
    public function requestProvider()
    {
        return array(
            array(
                array(
                    '1.1',
                    Request::METHOD_GET,
                    'http://www.wikipedia.org',
                    array(
                        'Connection' => 'close',
                        'Accept' => 'application/xhtml+xml',
                    )
                ),
                array(
                    'protocolVersion' => '1.1',
                    'method' => Request::METHOD_GET,
                    'url' => 'http://www.wikipedia.org:80/',
                    'headers' => array(
                        'Connection' => 'close',
                        'Accept' => 'application/xhtml+xml',
                    ),
                    'content' => null
                ),
                array(
                    '1.0',
                    Request::METHOD_POST,
                    'http://www.wikipedia.org',
                    array(
                        'Connection' => 'close',
                    ),
                    'key=value'
                ),
                array(
                    'protocolVersion' => '1.0',
                    'method' => Request::METHOD_POST,
                    'url' => 'http://www.wikipedia.org:80/',
                    'headers' => array(
                        'Connection' => 'close'
                    ),
                    'content' => 'key=value'
                ),
            ),
        );
    }
}
