<?php

namespace Saxulum\Tests\HttpClient;

use Saxulum\HttpClient\History;
use Saxulum\HttpClient\HistoryEntry;
use Saxulum\HttpClient\Request;
use Saxulum\HttpClient\Response;

class HistoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param HistoryEntry $historyEntry
     * @param string       $expected
     * @dataProvider historyProvider
     */
    public function testHistory(HistoryEntry $historyEntry, $expected)
    {
        $history = new History();
        $history->addHistoryEntry($historyEntry);

        $this->assertCount(1, $history->getHistoryEntries());
        $this->assertEquals($expected, (string) $history);
    }

    /**
     * @return array
     */
    public function historyProvider()
    {
        return array(
            array(
                new HistoryEntry(
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
                    )
                ),
                "GET / HTTP/1.1\r\nHost: http://test:80\r\nConnection: close\r\nAccept: application/xhtml+xml\n-----\nHTTP/1.1 200 OK\r\nContent-Length: 69\r\nContent-Type: application/xhtml+xml\r\n\r\n<html><head><title>test</title></head><body><p>test</p></body></html>"
            )
        );
    }
}
