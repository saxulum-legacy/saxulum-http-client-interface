<?php

namespace Saxulum\Tests\HttpClient;

use Saxulum\HttpClient\HeaderConverter;

class HeaderConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $rawHeaders
     * @param array $expected
     * @dataProvider convertRawToAssociativeProvider
     */
    public function testConvertRawHeaders(array $rawHeaders, array $expected)
    {
        $actual = HeaderConverter::convertRawToAssociative($rawHeaders);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @param array $associativeHeaders
     * @param array $expected
     * @dataProvider convertAssociativeToRawProvider
     */
    public function testConvertAssociativeToRaw(array $associativeHeaders, array $expected)
    {
        $actual = HeaderConverter::convertAssociativeToRaw($associativeHeaders);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @param array $complexAssociativeHeaders
     * @param array $expected
     * @dataProvider convertComplexAssociativeToFlatAssociativeProvider
     */
    public function testConvertComplexAssociativeToFlatAssociative(array $complexAssociativeHeaders, array $expected)
    {
        $actual = HeaderConverter::convertComplexAssociativeToFlatAssociative($complexAssociativeHeaders);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function convertRawToAssociativeProvider()
    {
        return array(
            array(
                array(
                    'Host: www.dominik-zogg.ch',
                    'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:33.0) Gecko/20100101 Firefox/33.0',
                    'Accept: text/html',
                    'Accept: application/xhtml+xml',
                    'Accept: application/xml;q=0.9',
                    'Accept: */*;q=0.8',
                    'Accept-Lanuage: de',
                    'Accept-Lanuage: en-US;q=0.7',
                    'Accept-Lanuage: en;q=0.3',
                    'Accept-Encoding: gzip',
                    'Accept-Encoding: deflate',
                    'Cookie: PHPSESSID=sessionid',
                    'Connection: keep-alive',
                    'Cache-Control: max-age=0',
                ),
                array(
                    'Host' => 'www.dominik-zogg.ch',
                    'User-Agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:33.0) Gecko/20100101 Firefox/33.0',
                    'Accept' => 'text/html, application/xhtml+xml, application/xml;q=0.9, */*;q=0.8',
                    'Accept-Lanuage' => 'de, en-US;q=0.7, en;q=0.3',
                    'Accept-Encoding' => 'gzip, deflate',
                    'Cookie' => 'PHPSESSID=sessionid',
                    'Connection' => 'keep-alive',
                    'Cache-Control' => 'max-age=0',
                ),
            ),
            array(
                array(
                    'Cache-Control: no-store',
                    'Cache-Control: no-cache',
                    'Cache-Control: must-revalidate',
                    'Cache-Control: post-check=0',
                    'Cache-Control: pre-check=0',
                    'Content-Type: text/html; charset=utf-8',
                    'Date: Sat, 18 Jan 2014 09:59:57 GMT',
                    'Expires: Fri, 06 Jun 1975 15:10:00 GMT',
                    'Last-Modified: Sat, 18 Oct 2014 09:59:57 GMT',
                    'Pragma: no-cache',
                    'Server: lighttpd',
                    'Transfer-Encoding: chunked',
                    'Vary: User-Agent'
                ),
                array(
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0',
                    'Content-Type' => 'text/html; charset=utf-8',
                    'Date' => 'Sat, 18 Jan 2014 09:59:57 GMT',
                    'Expires' => 'Fri, 06 Jun 1975 15:10:00 GMT',
                    'Last-Modified' => 'Sat, 18 Oct 2014 09:59:57 GMT',
                    'Pragma' => 'no-cache',
                    'Server' => 'lighttpd',
                    'Transfer-Encoding' => 'chunked',
                    'Vary' => 'User-Agent'
                ),
            ),
        );
    }

    /**
     * @return array
     */
    public function convertAssociativeToRawProvider()
    {
        return array(
            array(
                array(
                    'Host' => 'www.dominik-zogg.ch',
                    'User-Agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:33.0) Gecko/20100101 Firefox/33.0',
                    'Accept' => 'text/html, application/xhtml+xml, application/xml;q=0.9,*/*;q=0.8',
                    'Accept-Lanuage' => 'de,en-US;q=0.7,en;q=0.3',
                    'Accept-Encoding' => 'gzip,deflate',
                    'Cookie' => 'PHPSESSID=sessionid',
                    'Connection' => 'keep-alive',
                    'Cache-Control' => 'max-age=0',
                ),
                array(
                    'Host: www.dominik-zogg.ch',
                    'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:33.0) Gecko/20100101 Firefox/33.0',
                    'Accept: text/html, application/xhtml+xml, application/xml;q=0.9,*/*;q=0.8',
                    'Accept-Lanuage: de,en-US;q=0.7,en;q=0.3',
                    'Accept-Encoding: gzip,deflate',
                    'Cookie: PHPSESSID=sessionid',
                    'Connection: keep-alive',
                    'Cache-Control: max-age=0',
                ),
            ),
            array(
                array(
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0',
                    'Content-Type' => 'text/html; charset=utf-8',
                    'Date' => 'Sat, 18 Jan 2014 09:59:57 GMT',
                    'Expires' => 'Fri, 06 Jun 1975 15:10:00 GMT',
                    'Last-Modified' => 'Sat, 18 Oct 2014 09:59:57 GMT',
                    'Pragma' => 'no-cache',
                    'Server' => 'lighttpd',
                    'Transfer-Encoding' => 'chunked',
                    'Vary' => 'User-Agent'
                ),
                array(
                    'Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0',
                    'Content-Type: text/html; charset=utf-8',
                    'Date: Sat, 18 Jan 2014 09:59:57 GMT',
                    'Expires: Fri, 06 Jun 1975 15:10:00 GMT',
                    'Last-Modified: Sat, 18 Oct 2014 09:59:57 GMT',
                    'Pragma: no-cache',
                    'Server: lighttpd',
                    'Transfer-Encoding: chunked',
                    'Vary: User-Agent'
                ),
            ),
        );
    }

    /**
     * @return array
     */
    public function convertComplexAssociativeToFlatAssociativeProvider()
    {
        return array(
            array(
                array(
                    'Accept' => array(
                        'text/html', 'application/xhtml+xml', 'application/xml;q=0.9'
                    ),
                    'Accept-Lanuage' => array(
                        'de', 'en-US;q=0.7', 'en;q=0.3'
                    ),
                ),
                array(
                    'Accept' => 'text/html, application/xhtml+xml, application/xml;q=0.9',
                    'Accept-Lanuage' => 'de, en-US;q=0.7, en;q=0.3',
                )
            ),
        );
    }
}
