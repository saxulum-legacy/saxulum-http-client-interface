<?php

namespace Saxulum\Tests\HttpClient;

use Saxulum\HttpClient\Request;

class HttpClientTest extends \PHPUnit_Framework_TestCase
{
    public function testRequest()
    {
        $httpClient = new HttpClient();

        $response = $httpClient->request(new Request(
            '1.1',
            Request::METHOD_GET,
            'http://www.wikipedia.org',
            array(
                'Connection' => 'close',
            )
        ));

        $this->assertEquals('1.1', $response->getProtocolVersion());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('OK', $response->getStatusMessage());
    }
}
