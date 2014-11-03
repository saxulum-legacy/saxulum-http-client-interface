<?php

namespace Saxulum\Tests\HttpClient;

use Saxulum\HttpClient\HistoryEntry;
use Saxulum\HttpClient\Request;
use Saxulum\HttpClient\Response;

class HistoryEntryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param Request  $request
     * @param Response $response
     * @param string   $expected
     * @dataProvider historyEntryProvider
     */
    public function testHistoryEntry(Request $request, Response $response, $expected)
    {
        $historyEntry = new HistoryEntry($request, $response);

        $this->assertInstanceOf('Saxulum\HttpClient\Request', $historyEntry->getRequest());
        $this->assertInstanceOf('Saxulum\HttpClient\Response', $historyEntry->getResponse());
        $this->assertEquals($expected, (string) $historyEntry);
    }

    /**
     * @return array
     */
    public function historyEntryProvider()
    {
        return array(
            array(
                new Request(
                    '1.1',
                    Request::METHOD_GET,
                    'http://test',
                    array(
                        'Connection' => 'close',
                        'Accept' => 'application/xhtml+xml',
                    )
                ),
                new Response(
                    '1.1',
                    200,
                    'OK',
                    array(
                        'Content-Length' => '69',
                        'Content-Type' => 'application/xhtml+xml',
                    ),
                    '<html><head><title>test</title></head><body><p>test</p></body></html>'
                ),
                "GET / HTTP/1.1\r\nHost: http://test:80\r\nConnection: close\r\nAccept: application/xhtml+xml\n-----\nHTTP/1.1 200 OK\r\nContent-Length: 69\r\nContent-Type: application/xhtml+xml\r\n\r\n<html><head><title>test</title></head><body><p>test</p></body></html>"
            )
        );
    }
}
